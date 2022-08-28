using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace WebAppLogicCheck
{
    public class Class2
    {
        public string func1(string str)
        {
            try {
                string[] columns = str.Split(',');
                if (columns[0] == "01" || columns[0] == "12" || columns[0] == "22")
                    return "true";
                else return "false";
            }
            catch(IndexOutOfRangeException e)
            {
                return e.Message+"\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func2(string str)
        {
            try {
                string[] columns = str.Split(',');
                if ((columns[4] == "売上" || columns[4] == "返品")
                    || columns[5] == "成功" && columns[6] != "00")
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func3(string str)
        {
            try {
                string[] columns = str.Split(',');
                if ((columns[4] == "売上" || columns[4] == "返品")
                    || columns[5] == "成功" && columns[6] != "00")
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func4(string str)
        {
            try {
                string[] columns = str.Split(',');
                if ((columns[0] == "1" && columns[28] != "99"))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func5(string str)
        {
            try {
                string[] columns = str.Split(',');
                if ((columns[3] == "20"))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func6(string str)
        {
            try {
                string[] columns = str.Split(',');
                if ((columns[13] == ""))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func7(string str)
        {
            try {
                string[] columns = str.Split(',');
                if ((columns[0] == "2"))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func8(string str)
        {
            try {
                string[] columns = str.Split(',');
                if ((columns[0] == "1"))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func9(string str)
        {
            try {
                string[] columns = str.Split(',');
                if ((columns[0] == "6"))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func10(string str)
        {
            try
            {
                string[] columns = str.Split(',');
                if ((columns[0] == "1"))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
           
        }
        public string func11(string str)
        {
            try {
                string[] columns = str.Split(',');
                if ((columns[3] != "0"))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }
            
        }
        public string func12(string str)
        {
            try
            {
                if ((str[0] == '2' && str[111]=='0'))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }

        }
        public string func13(string str)
        {
            try
            {
                string[] columns = str.Split(',');
                if ((columns[0] != "通番" || columns[0] != "") && (columns[2] == "" && columns[4]==""))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }

        }
        public string func14(string str)
        {
            try
            {
                string[] columns = str.Split(',');
                if ((columns[3] != "0"))
                    return "true";
                else return "false";
            }
            catch (IndexOutOfRangeException e)
            {
                return e.Message + "\nError! Index out of Range. Too short input provided.";
            }

        }
        public string readFile(int id,string text)
        {
            if (id < 1 || id > 14)
            {
                return "Error! ID must be from 1-14 .";
            }
            else if(text=="")
            {
                return "Error! Input text is blank .";
            }
            else
            {
                string final="";
                if(id==1)
                {
                    final=func1(text);
                }
                else if (id == 2)
                {
                    final = func2(text);
                }
                else if (id == 3)
                {
                    final = func3(text);
                }
                else if (id == 4)
                {
                    final = func4(text);
                }
                else if (id == 5)
                {
                    final = func5(text);
                }
                else if (id == 6)
                {
                    final = func6(text);
                }
                else if (id == 7)
                {
                    final = func7(text);
                }
                else if (id == 8)
                {
                    final = func8(text);
                }
                else if (id == 9)
                {
                    final = func9(text);
                }
                else if (id == 10)
                {
                    final = func10(text);
                }
                else if (id == 11)
                {
                    final = func11(text);
                }
                else if (id == 12)
                {
                    final = func12(text);
                }
                else if (id == 13)
                {
                    final = func13(text);
                }
                
                return final;
            }
        }
    }
}