using System;
using System.Collections.Generic;
using System.Text;
using System.Runtime.InteropServices;
using System.Threading;
namespace ConsoleApplication1
{
    class Program
    {

        [DllImport("kernel32.dll", EntryPoint = "WinExec")]
        public static extern int WinExec(string lpCmdLine, int nCmdShow);

        static void Main(string[] args)
        {
            while (true)
            {
                string url = System.AppDomain.CurrentDomain.BaseDirectory;
                WinExec(url + "\\qqnotic.exe", 1);
                Thread.Sleep(6000);
            }

        }
    }
}