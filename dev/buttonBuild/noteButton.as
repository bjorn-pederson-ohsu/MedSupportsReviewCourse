﻿package buttonBuild{	import flash.events.Event;	import flash.events.EventDispatcher;	import flash.display.Sprite;	import flash.display.Shape;	import caurina.transitions.Tweener;	import caurina.transitions.properties.DisplayShortcuts;	import caurina.transitions.properties.FilterShortcuts;	import caurina.transitions.properties.ColorShortcuts;	import flash.events.MouseEvent;	import flashx.textLayout.compose.StandardFlowComposer;	import flashx.textLayout.container.ContainerController;	import flashx.textLayout.elements.ParagraphElement;	import flashx.textLayout.elements.SpanElement;	import flashx.textLayout.elements.TextFlow;	import flashx.textLayout.formats.*;	import flashx.textLayout.conversion.TextConverter;	import flashx.textLayout.edit.SelectionManager;	public class noteButton extends Sprite {		public static var UPDATE:String = 'ButtonClicked';		private var buttonTitle:String = "";		public var buttonNum:int;		private var noteBg:noteSym		private var myShape:Shape;		private var myFrame:Shape;		private var textSpace:Sprite;		private var button:Sprite;		private var bg:Sprite;		private var bgFrame:Sprite;		public var labeltxt:String = "helpful information";		private var _textFlow:TextFlow;		private var cont:ContainerController;		private var widthNum:int=200		private var heightNum:int=30		private var shortText:String=""		public function noteButton(s:String,i:int) {			// constructor code			labeltxt = s			buttonNum = i;			DisplayShortcuts.init();			FilterShortcuts.init();			ColorShortcuts.init();			addEventListener(Event.ADDED_TO_STAGE,noteButtonBuild);		}		private function noteButtonBuild(event:Event):void {			removeEventListener(Event.ADDED_TO_STAGE,noteButtonBuild);			button = new Sprite() ;			addChild(button);			button.name="Button"			noteBg = new noteSym ()			noteBg.name="noteBg"			button.addChild(noteBg)			bg=new Sprite ();			button.addChild(bg);			bg.name="bg"			bg.x=25			myShape = new Shape();			myShape.graphics.beginFill(0xF3FAF9,1);			//myShape.graphics.lineStyle(1, 0x000000, .75, true);						myShape.graphics.moveTo(5, 0);			myShape.graphics.lineTo(widthNum, 0);			myShape.graphics.lineTo(widthNum,heightNum-5);			myShape.graphics.curveTo(widthNum,heightNum,widthNum-5,heightNum);			myShape.graphics.lineTo(5, heightNum);			//myShape.graphics.curveTo(0,heightNum,0,(heightNum-5));			myShape.graphics.lineTo(5,20);			myShape.graphics.lineTo(0,15);			myShape.graphics.lineTo(5,10);			myShape.graphics.lineTo(5,0);			myShape.graphics.endFill();			bg.addChild(myShape);			myShape.name="myShape"			bg.y = (.5*noteBg.height)-(.5*heightNum)			bgFrame=new Sprite ();			button.addChild(bgFrame);			bgFrame.name="bgFrame"			myFrame = new Shape() ;			myFrame.graphics.lineStyle(1, 0x000000, .75, true);			myFrame.graphics.moveTo(5, 0);			myFrame.graphics.lineTo(widthNum, 0);			myFrame.graphics.lineTo(widthNum,heightNum-5);			myFrame.graphics.curveTo(widthNum,heightNum,widthNum-5,heightNum);			myFrame.graphics.lineTo(5, heightNum);			//myFrame.graphics.curveTo(0,heightNum,0,(heightNum-5));			myFrame.graphics.lineTo(5,20);			myFrame.graphics.lineTo(0,15);			myFrame.graphics.lineTo(5,10);			myFrame.graphics.lineTo(5,0);			bgFrame.addChild(myFrame);			myFrame.name="myFrame"			bgFrame.x=bg.x			bgFrame.y=bg.y			//bgFrame.alpha = 0;			//Tweener.addTween(myShape,{_Glow_alpha:.75,_Glow_blurX:10,_Glow_blurY:10,_Glow_color:0xffffff,_Glow_inner:true});			textSpace = new Sprite ();			button.addChild(textSpace);			textSpace.x = 35			textSpace.y = bg.y			textSpace.name="textSpace"			shortText = charCount(labeltxt)			trace(shortText)			beginFlow(shortText);		}		private function charCount(s:String):String {			var t:String = new String ();			if (s.length > 50)			{				t = "" + s.slice(0,49) + "..."			} else			{				t = s;			}			return t;		}		private function beginFlow(s:String):void {			_textFlow = new TextFlow();			_textFlow.flowComposer = new StandardFlowComposer();			_textFlow = TextConverter.importToFlow(s,TextConverter.PLAIN_TEXT_FORMAT);			_textFlow.textAlign = TextAlign.LEFT;			_textFlow.verticalAlign = VerticalAlign.MIDDLE;			_textFlow.fontFamily = "Optima";			_textFlow.fontLookup = "embeddedCFF";			_textFlow.fontSize = 13;			cont = new ContainerController(textSpace,(myShape.width-12),(myShape.height));			_textFlow.flowComposer.addController(cont);			_textFlow.interactionManager = new SelectionManager();			_textFlow.flowComposer.updateAllControllers();			buttonFunction();		}		private function buttonFunction():void {			bg.visible=false;			bgFrame.visible=false			textSpace.visible=false			button.buttonMode = true;			button.mouseChildren = false;			button.useHandCursor = true;			button.addEventListener(MouseEvent.MOUSE_OVER,buttonOver);			button.addEventListener(MouseEvent.MOUSE_OUT, buttonOut);			button.addEventListener(MouseEvent.MOUSE_DOWN, buttonDown);			button.cacheAsBitmap=true			button.addEventListener(Event.REMOVED_FROM_STAGE, removedFromStage);		}		private function buttonOver(event:MouseEvent):void {			//trace ("buttonOver") 			Tweener.addTween(textSpace,{time:.2,_autoAlpha:1,transition:"easeOutQuad"});			Tweener.addTween(bg,{time:.2,_autoAlpha:1,transition:"easeOutQuad"});			Tweener.addTween(bgFrame,{time:.2,_autoAlpha:1,transition:"easeOutQuad"});			Tweener.addTween(noteBg,{time:.2,_Glow_alpha:.75,_Glow_blurX:15,_Glow_blurY:15,_Glow_color:0xffffff,_Glow_inner:false,transition:"easeOutQuad"});		}		private function buttonOut(event:MouseEvent):void {			//trace ("buttonOut") 			Tweener.addTween(textSpace,{time:.2,_autoAlpha:0,transition:"easeOutQuad"});			Tweener.addTween(bg,{time:.2,_autoAlpha:0,transition:"easeOutQuad"});			Tweener.addTween(noteBg,{time:.2,_Glow_alpha:0,_Glow_blurX:0,_Glow_blurY:0,_Glow_color:0xffffff,_Glow_inner:false,transition:"easeOutQuad"});			Tweener.addTween(bgFrame,{time:.2,_autoAlpha:0,transition:"easeOutQuad"});		}		private function buttonDown(event:MouseEvent):void {			dispatchEvent(new Event(noteButton.UPDATE));		}		private function removedFromStage(event:Event) {			button.removeEventListener(Event.REMOVED_FROM_STAGE, removedFromStage);						button.removeEventListener(MouseEvent.MOUSE_OVER,buttonOver);			button.removeEventListener(MouseEvent.MOUSE_OUT, buttonOut);			button.removeEventListener(MouseEvent.MOUSE_DOWN, buttonDown);			button = null;		}	}}