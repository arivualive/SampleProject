using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using MyProj.Models;


namespace MyProj.Controllers
{
    public class HelloController : Controller
    {
        private readonly MyContext _context;

        public HelloController(MyContext context){
            this._context = context;
        }

        public IActionResult List() {
            return View(this._context.Book);
        }

        public IActionResult Add() {
            return View(this._context.Book);
        }

         public IActionResult Update() {
            return View(this._context.Book);
        }
    }
}