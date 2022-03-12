<?php

	function userFullName(){
		return auth()->user()->nom." ".auth()->user()->email;
	}