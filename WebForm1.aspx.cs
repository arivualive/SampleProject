using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WebAppLogicCheck
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void submitBtn_Click(object sender, EventArgs e)
        {
            Class2 obj = new Class2();
            if(idText.Text=="")
            {
                output.Text = "Error! Id is Empty.";
            }
            if (inputText.Text == "")
            {
                output.Text = "Error! Input is Empty.";
            }
            if(idText.Text!=""&&inputText.Text!="")
                output.Text = obj.readFile(int.Parse(idText.Text),inputText.Text);
        }
    }
}