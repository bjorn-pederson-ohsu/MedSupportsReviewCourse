﻿package com.reflektii.db{	import flash.events.Event;	import flash.events.EventDispatcher;	import flash.net.*;	import flash.events.IOErrorEvent;	public class dbsend extends EventDispatcher	{		public static var UPDATE:String = 'XMLUpdated';		private var loader:URLLoader;		private var locale:URLRequest;		private var variousVars:URLVariables;		private var url:String = "";		private var dbVars:Array = [];		private var flashVars:Array = [];		private var _xmlfinal:XML;		public function dbsend(s:String, a:Array, b:Array)		{			// constructor code			url = s;			dbVars = a;			flashVars = b;			loader = new URLLoader  ;			locale = new URLRequest(url);			locale.method = URLRequestMethod.POST;			loader.dataFormat = URLLoaderDataFormat.TEXT;			variousVars = new URLVariables();			for (var p:int=0; p<flashVars.length; p++)			{			variousVars[dbVars[p]] = flashVars[p];			}			locale.data = variousVars;			loader.load(locale);			loader.addEventListener(Event.COMPLETE, onComplete);			loader.addEventListener(IOErrorEvent.IO_ERROR, onError);		}		private function onComplete(event:Event):void		{			_xmlfinal = new XML(event.target.data);			dispatchEvent(new Event(dbsend.UPDATE));		}		private function onError(event:IOErrorEvent):void		{			trace("something went wrong");		}				public function get xmlfinal():XML{			return _xmlfinal		}	}}