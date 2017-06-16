using System;
using System.Collections.Generic;
using System.Text;
using System.Runtime.InteropServices;
using System.Diagnostics;
using System.Text.RegularExpressions;
using System.Threading;
using System.Configuration;
using System.IO;
using System.Collections;
using System.Windows.Forms;
using MySQLDriverCS;


namespace ConsoleApplication1
{
    class Program
    {
        public static int qq;
        public static string qqname ;
        public static string realname;
        public static string notis ;  
        public static IntPtr hander;
        public static string bbtype;
        public static string bbcontent;
        public static string dbconn;

        public static string Cmd(string[] cmd)
        {
            Process p = new Process();
            p.StartInfo.FileName = "cmd.exe";
            p.StartInfo.UseShellExecute = false;
            p.StartInfo.RedirectStandardInput = true;
            p.StartInfo.RedirectStandardOutput = true;
            p.StartInfo.RedirectStandardError = true;
            p.StartInfo.CreateNoWindow = true;
            p.Start();
            p.StandardInput.AutoFlush = true;
            for (int i = 0; i < cmd.Length; i++)
            {
                p.StandardInput.WriteLine(cmd[i].ToString());
            }
            p.StandardInput.WriteLine("exit");
            string strRst = p.StandardOutput.ReadToEnd();
            p.WaitForExit();
            p.Close();
            return strRst;
        }


        [DllImport("user32.dll", EntryPoint = "FindWindow", CharSet = CharSet.Auto)]
        private extern static IntPtr FindWindow(string classname, string captionName);

        [DllImport("user32.dll")]
        static extern bool PostMessage(IntPtr hwnd, int msg, int wParam, uint lParam);

        delegate bool EnumWindowsProc(IntPtr hWnd, IntPtr lParam);

        [DllImport("user32.dll")]
        static extern int EnumWindows(EnumWindowsProc hWnd, IntPtr lParam);

        [DllImport("user32.dll", CharSet = CharSet.Auto)]
        static extern int GetWindowText(IntPtr hWnd, StringBuilder lpText, int nCount);

        [DllImport("user32.dll", EntryPoint = "SendMessage")]
        public static extern int SendMessage(IntPtr hwnd, int wMsg, uint wParam, uint lParam);

       // [DllImport("user32.dll", EntryPoint = "ShowWindow", SetLastError = true)]
       // static extern bool ShowWindow(IntPtr hWnd, uint nCmdShow);

        static bool PrintWindow(IntPtr hWnd, IntPtr lParam)
        {
            var sb = new StringBuilder(50);
            GetWindowText(hWnd, sb, sb.Capacity);
            string b = qqname;
            if (sb.ToString().IndexOf(b) > -1)
            {
                hander = hWnd;

            }
            return true;
        }

        [STAThread]
        static void Main(string[] args)
        {

         //   while (true)
        //    {

                try
                {
                    StreamReader objReader = new StreamReader("setting.ini");
                    string sLine = "";
                    ArrayList arrText = new ArrayList();
                    while (sLine != null)
                    {
                        sLine = objReader.ReadLine();
                        if (sLine != null)
                            arrText.Add(sLine);
                    }
                    objReader.Close();
                   // foreach (string sOutput in arrText)
                   // dbconn = sOutput;
                    //MySQLConnection conn = new MySQLConnection(new MySQLConnectionString("192.168.234.129", "qqnotic", "toryzen", "q1w2e3r4").AsString);//实例化一个连接对象其中myquest为数据库名，root为数据库用户名，amttgroup为数据库密码 
                    MySQLConnection conn = new MySQLConnection(new MySQLConnectionString(arrText[0].ToString(), arrText[1].ToString(), arrText[2].ToString(), arrText[3].ToString()).AsString);//实例化一个连接对象其中myquest为数据库名，root为数据库用户名，amttgroup为数据库密码 
                    conn.Open();
                    MySQLCommand commn = new MySQLCommand("set names gb2312;", conn);
                    commn.ExecuteNonQuery();
                    MySQLCommand cmds = new MySQLCommand("select * from qqnotic where isok = 0 limit 1", conn);
                    MySQLDataReader reader = cmds.ExecuteReaderEx();
                    while (reader.Read())
                    {
                        int userid = int.Parse(reader["userid"].ToString()); //用户id
                        int checktype = int.Parse(reader["btype"].ToString()); //业务类型

                        MySQLCommand cmdname = new MySQLCommand("select * from qqname where id = " + userid, conn);
                        MySQLDataReader readername = cmdname.ExecuteReaderEx();
                        while (readername.Read())
                        {
                            qq = int.Parse(readername["qqnum"].ToString()); //qq号码
                            qqname = (string)readername["qqname"];   //qq昵称
                            realname = (string)readername["realname"]; //用户真名
                        }

                        bbtype = "光宇信息中心通知";   //通知标题
                        bbcontent = (string)reader["content"];  //通知内容

                        /* 若指定通知类型 */
                        if (checktype != 0)
                        {

                            MySQLCommand cmdtype = new MySQLCommand("select * from btype where id = " + checktype, conn);
                            MySQLDataReader btype = cmdtype.ExecuteReaderEx();
                            while (btype.Read())
                            {
                                bbtype = (string)btype["type"]; //通知标题
                                bbcontent = (string)btype["content"]; //通知内容
                            }

                        }

                        System.DateTime startTime = TimeZone.CurrentTimeZone.ToLocalTime(new System.DateTime(1970, 1, 1));

                        int timeStamp = (int)(System.DateTime.Now - startTime).TotalSeconds;

                        MySQLCommand excmds = new MySQLCommand("UPDATE `qqnotic`.`qqnotic` SET `isok` = '1',`extime` = " + timeStamp + " WHERE `qqnotic`.`id` =" + reader["id"], conn);
                        
                        excmds.ExecuteNonQuery(); //写入系统时间


                        notis = bbtype + ":\n" + realname + "您好，" + bbcontent;


                        Console.WriteLine(System.DateTime.Now + "向用户" + realname + "(" + qq + ") 发送一条信息！");
                    }
                    conn.Close();
                }
                catch { Exception e; }

                if (qq != 0 && notis != "")
                {
                    try
                    {
                        Clipboard.Clear();
                        Clipboard.SetDataObject(notis,true);
                    }
                    catch { Exception e; }
                    const int WM_CHAR = 0x0102;
                    const int WM_KEYDOWN = 0x0100;
                    const int WM_PASTE = 0x0302;
                    const int WM_SETTEXT = 0x000C;
                    const int WM_Close = 0x0010;
                    string[] cmd = new string[] { "start tencent://message/?uin=" + qq + "&Site=gyyx.cn&Menu=yes" };
                    Cmd(cmd);
                    Thread.Sleep(1000);
                    EnumWindows(PrintWindow, IntPtr.Zero);
                    string tr = notis;
                    IntPtr hwndCalc = hander;

                    //ShowWindow(hwndCalc,1);

                    PostMessage(hwndCalc, WM_PASTE, 0, 0);
                    Thread.Sleep(500);
                    PostMessage(hwndCalc, WM_KEYDOWN, 13, 0);
                    Thread.Sleep(500);
                    //PostMessage(hwndCalc, WM_KEYDOWN, 27, 0);
                    PostMessage(hwndCalc, WM_Close, 0, 0);
                    Thread.Sleep(1000);
                    qq = 0;
                    notis = "";
                }
             //   else { Thread.Sleep(6000); }


       //     }
        }
    }
}
