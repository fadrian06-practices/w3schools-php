<?php
	class greeting {
		public static function welcome() {
			echo "Hello World!";
		}
	}

	class SomeOtherClass {
		public function message() {
			greeting::welcome();
		}
	}
?>