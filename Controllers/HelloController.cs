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

        // MyContext db = new MyContext();

        // public IActionResult List()
        // {
        //     return View(db.Book.ToList());
        // }

        // public IActionResult Add()
        // {
        //     return View();
        // }

        // public IActionResult Update()
        // {
        //     return View();
        // }

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