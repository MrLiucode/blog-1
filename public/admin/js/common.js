$(function(){$("#side-menu").metisMenu(),$(window).bind("load resize",function(){width=this.window.innerWidth>0?this.window.innerWidth:this.screen.width,width<768?$("div.sidebar-collapse").addClass("collapse"):$("div.sidebar-collapse").removeClass("collapse")}),$("select").select2()});