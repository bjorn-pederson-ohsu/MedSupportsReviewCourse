﻿package buttonBuild{	import flash.events.Event;	import flash.events.EventDispatcher;	import flash.display.Sprite;	import flash.display.Loader;	import flash.display.Bitmap;	import flash.net.URLRequest;	import caurina.transitions.Tweener;	import caurina.transitions.properties.FilterShortcuts;	import flash.events.MouseEvent;	public class pdfDoc extends Sprite {		//private var tween:Tweener		//private var filter:FilterShortcuts		public static var UPDATE:String = 'ButtonClicked';		//public static var HEIGHTSET:String = 'HieghtSet';		public var locate:String = "";		public var buttonCaption:String = "";		public var buttonNum:int;		public var butSize:String;		private var thumbLoader:Loader;		private var button:pdfBut;		//private var _model:Object;		public function pdfDoc(i:int,s:String,t:String,l:String) {			// constructor code			buttonCaption = s;			buttonNum = i;			locate = l;			butSize = t;			//_model = m;			FilterShortcuts.init();			addEventListener(Event.ADDED_TO_STAGE,loadbutton);		}		private function loadbutton(event:Event):void {			removeEventListener(Event.ADDED_TO_STAGE,loadbutton);			button = new pdfBut();			addChild(button);			//var r:String = charCount(buttonCaption)			button.titletext.text = "" + charCount(buttonCaption) + "\n" + butSize;			//trace ("butHeight: "+butHeight)			//button.addChild(thumbLoader)			button.icon.alpha=.75			button.buttonMode = true;			button.mouseChildren = false;			button.useHandCursor = true;			button.addEventListener(MouseEvent.MOUSE_OVER,buttonOver);			button.addEventListener(MouseEvent.MOUSE_OUT, buttonOut);			button.addEventListener(MouseEvent.MOUSE_DOWN, buttonDown);			button.addEventListener(Event.REMOVED_FROM_STAGE, removedFromStage);		}		private function charCount(s:String):String {			var t:String = new String ();			if (s.length > 40)			{				t = "" + s.slice(0,39) + "..."			} else			{				t = s;			}			return t;		}		private function buttonOver(event:MouseEvent):void {			Tweener.addTween(button.icon,{alpha:1,_Glow_alpha:.75,_Glow_blurX:15,_Glow_blurY:15,_Glow_color:0x007B19,_Glow_inner:false,time:.3,transition:"easeOutQuad"});		}		private function buttonOut(event:MouseEvent):void {			Tweener.addTween(button.icon,{alpha:.75,_Glow_alpha:0,_Glow_color:0x007B19,_Glow_inner:false,time:.3,transition:"easeOutQuad"});		}		private function buttonDown(event:MouseEvent):void {			dispatchEvent(new Event(pdfDoc.UPDATE));		}		private function removedFromStage(event:Event) {			button.removeEventListener(Event.REMOVED_FROM_STAGE, removedFromStage);			//_model.removeEventListener('submenuupdated',colorChangeSet);			//button.removeEventListener(_model.MENUUPDATE,colorChange);			//if (_model.subMenuArea != buttonNum)			//{			button.removeEventListener(MouseEvent.MOUSE_OVER,buttonOver);			button.removeEventListener(MouseEvent.MOUSE_OUT, buttonOut);			button.removeEventListener(MouseEvent.MOUSE_DOWN, buttonDown);			button = null;			//}		}	}}