<?php
	#
	# Roflmarkdown - An implementation of Markdown that doesn't have shit I don't need.
	# Copyright (c) 2012 andy rofl
	# http://www.andyrofl.com
	#
	# Original Markdown
	# Copyright (c) 2004-2006 John Gruber  
	# <http://daringfireball.net/projects/markdown/>
	#
	
	function Markdown($S_text){
		#
		# Initialize the parser and return the result of its transform method.
		#
		# Setup static parser variable.
		static $parser;
		if(!isset($parser)){
			$parser = new Markdown;
		}
		#Parse the fuck out of that text
		return $parser->convert($text);
	}
	function Markup($S_text){
		#
		# Initialize the parser and return the result of its transform method.
		#
		# Setup static parser variable.
		static $parser;
		if(!isset($parser)){
			$parser = new Markup;
		}
		#Parse the fuck out of that text
		return $parser->convert($text);
	}
	class Markdown{
		/**
		 * Main parsing function
		 * @param String $text
		 * @return converted text in HTML
		 */
		function convert($text){
			
		}
	}
	class Markup{
		/**
		 * Main parsing function
		 * @param String $text
		 * @return converted text in Markdown
		 */
		function convert($text){
			
		}
	}
?>