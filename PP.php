<?php
	/**
	 * PHP pretty print is a php class for printing php-variables in a easy way. 
	 * Supports embedded arrays etc. Good for debugging.
	 * 
	 * Initial version by Eugeny Pavlenko
	 * Homepage: http://EugenyPavlenko.com
	 * Date: 19.08.2013
	 * License: MIT
	 */
	class PP {

		// some settings
		private
			//$printTime = true,
			//$printBackTraces = true,
			$doAlignKeys = true;
		
		private 
			$ulMarginLeft = 40;
		
		private function isAssocArr($arr)	{
			return (bool)count(array_filter(array_keys($arr), 'is_string'));
		}

		private function printKey($k, $keysMaxLen, $assoc) {
			// 2 means two quotes (")
			$plus = $assoc ? 2 : 0;
			
			if (is_string($k)) {
				
				$k = "\"{$k}\"";
				
				if ($this->doAlignKeys) {
					$k = str_pad($k, $keysMaxLen+$plus);
					$k = str_replace(' ', '&nbsp;', $k);
				}
				
				return "<span style='color: #8b0000'>{$k}</span>";
				
			} else {
				
				if ($this->doAlignKeys) {
					$k = str_pad(strval($k), $keysMaxLen+$plus);
					$k = str_replace(' ', '&nbsp;', $k);
				}
				
				return "<span style='color: #8b0000'>{$k}</span>";
			}
		}

		private function printValue($v) {
			if (is_string($v)) {
				$v = htmlentities($v);
				return "<span style='color: #8b0000'>\"{$v}\"</span>";
			} elseif (is_array($v)) {
				$v = "[]";
				return "<span style='font-weight: bold'>{$v}</span>";
			} elseif (is_bool($v)) {
				$v = ($v) ? "true" : "false";
				return "<span style='font-weight: bold'>{$v}</span>";
			} elseif (is_null($v)) {
				$v = "null";
				return "<span style='color: #00008b; font-weight: bold'>{$v}</span>";
			} elseif (is_object($v)) {
				$v = trim(print_r($v, true));
				return "<span style='color: #000'>{$v}</span>";
			} else {
				$v = print_r($v, true);
				return "<span style='color: #00008b'>{$v}</span>";
			}
		}
		
		private function doRecursion($arr, $firstCall) {
			
			if ($firstCall) {
				$mrg = is_array($arr) ? '0 0 0 '.$this->ulMarginLeft.'px' : '0';
				$retStr = (is_array($arr) ? ($this->isAssocArr($arr) ? '{' : '[') : '') . '<ul style="list-style-type: none; padding: 0px; margin: '.$mrg.'">';
			} else {
				$retStr = '<ul style="list-style-type: none; padding: 0px; margin-left: '.$this->ulMarginLeft.'px;">';
			}

			if (is_array($arr) && (count($arr) > 0)) {
				$i = 0;
				$len = count($arr);

				$keyLen = 0;
				foreach ($arr as $key => $val) {
					$t = (string)$key;
					if (strlen($t) > $keyLen)
						$keyLen = strlen($t);
				}

				$assoc = $this->isAssocArr($arr);

				foreach ($arr as $key => $val){
					$comma = ($i == $len-1) ? '' : ',';

					if (is_array($val) && (count($val) > 0)) {
						if ($this->isAssocArr($val)) {
							$retStr .= '<li>' . $this->printKey($key, $keyLen, $assoc) . ': {' . $this->doRecursion($val, false) . '}'.$comma.'</li>';
						} else {
							$retStr .= '<li>' . $this->printKey($key, $keyLen, $assoc) . ': [' . $this->doRecursion($val, false) . ']'.$comma.'</li>';
						}
					} else {
						$retStr .= '<li>' . $this->printKey($key, $keyLen, $assoc) . ': ' . $this->printValue($val)  . $comma . '</li>';
					}

					$i++;
				}
			} else {
				$retStr .= '<li>' . $this->printValue($arr) . '</li>';
			}

			$retStr .= '</ul>';
			
			if ($firstCall && is_array($arr)) {
				$retStr .= ($this->isAssocArr($arr) ? '}' : ']');
			}

			return $retStr;
		}
		
		private function doPrettyPrint($arr) {
			$r = $this->doRecursion($arr, true);

			$o = <<<EOF
<div style="border: 1px solid #d3d3d3; border-radius: 4px; padding: 10px; font-size: 14px; font-family: 'Courier New', Arial; background-color: rgb(255, 255, 255);">{$r}</div>
EOF;

			return $o;
		}


		public static function do_($v) {
			$tmp = new self();
			return $tmp->doPrettyPrint($v);
		}
	}
