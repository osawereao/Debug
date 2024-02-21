<?php //*** DebugX » Tydi™ Framework © 2024 ∞ AO™ • @iamodao • www.osawere.com ∞ Apache License ***//

class DebugX
{

	// • ==== call → handler - undefined method » error
	public function __call($method, $argument)
	{
		$caller = __CLASS__ . '→' . $method . '()';
		return self::oversight(__CLASS__, 'Method Unreachable', $caller);
	}





	// • ==== callStatic → handler - undefined static method » error
	public static function __callStatic($method, $argument)
	{
		$caller = __CLASS__ . '::' . $method . '()';
		return self::oversight(__CLASS__, 'Static: Method Unreachable', $caller);
	}





	// • ==== style → ... »
	private static function style($flag)
	{

		switch ($flag) {
			case 'label':
				$style = 'color:#FFD700;';
				break;

			case 'key':
				$style = 'color:#A52A2A;';
				break;

			case 'value':
				$style = 'color:#D2B48C; display: inline-block; padding-left: 2px;';
				break;

			case 'title':
				$style = 'color:#0F0F0F; margin:0; line-height:1.5; display:block;';
				break;

			case 'content':
				$style = 'color:purple;';
				break;

			case 'partition':
				$style = 'border-left: 1px dotted #FFD700; margin: 5px 8px; padding: 2px 6px; line-height:1.36';
				break;

			case 'container':
				$style = 'border: 1px dashed tan; padding: 5px 10px; margin-bottom:6px;';
				break;

			default:
				$style = '';
				break;
		}

		return $style;
	}





	// • ==== value → ... »
	protected static function value($value)
	{
		if (is_string($value) || is_numeric($value)) {
			return '<span style="' . self::style('content') . '">' . $value . '</span>';
		}
		if (is_bool($value)) {
			if ($value === true) {
				$value = 'True';
			} else {
				$value = 'False';
			}
			return '<span style="' . self::style('content') . '">' . $value . '</span>';
		}
		if (is_null($value)) {
			return '<span style="' . self::style('content') . '">Null</span>';
		}
		if (is_array($value)) {
			return self::array($value);
		}
		if (is_callable($value)) {
			return '<span style="' . self::style('content') . '">Closure</span>';
		}
	}





	// • ==== null → ... »
	protected static function null($var)
	{
		return self::value($var);
	}





	// • ==== string → ... »
	protected static function string(string $var)
	{
		return self::value($var);
	}





	// • ==== boolean → ... »
	protected static function boolean(bool $var)
	{
		return '<strong style="' . self::style('key') . '">Boolean: </strong>' . self::value($var);
	}





	// • ==== array → ... »
	protected static function array(array $var)
	{
		$o = '<em style="' . self::style('label') . '">is_array</em>';
		$o .= '<div style="' . self::style('partition') . '">';
		foreach ($var as $key => $value) {
			$o .= '<div><strong style="' . self::style('key') . '">' . $key . ': </strong>' . self::value($value) . '</div>';
		}
		$o .= '</div>';
		return $o;
	}





	// • ==== object → ... »
	protected static function object(object $var)
	{
		$o = '<em style="' . self::style('label') . '">is_object</em>';
		$o .= '<div style="' . self::style('partition') . '">';
		foreach ($var as $key => $value) {
			$o .= '<div><strong style="' . self::style('key') . '">' . $key . ' → </strong>' . self::value($value) . '</div>';
		}
		$o .= '</div>';
		return $o;
	}





	// • ==== dump → ... »
	public static function dump($var, string $title = null)
	{
		$o = '<div style="' . self::style('container') . '">';

		if (!empty($title)) {
			$o .= '<strong style="' . self::style('title') . '">' . $title . '</strong> ';
		}

		switch (true) {
			case is_null($var):
				$o .= self::null($var);
				break;

			case is_string($var) || is_integer($var) || is_numeric($var):
				$o .= self::string($var);
				break;

			case is_bool($var):
				$o .= self::boolean($var);
				break;

			case is_array($var):
				$o .= self::array($var);
				break;

			case is_object($var):
				$o .= self::object($var);
				break;
		}

		$o .= '</div>';
		echo $o;

		return;
	}





	// • ==== exit → output and exit »
	public static function exit($var, string $title = 'TYDI')
	{
		if (empty($title)) {
			$title = FRAMEWORK . '™';
		}
		self::dump($var, $title);
		exit;
	}





	// • ==== trace → ... »
	public static function trace($file, $line)
	{
		return ['file' => $file, 'line' => $line];
	}





	// • ==== closure → ... »
	private static function closure($closure)
	{
		$reflection = new \ReflectionFunction($closure);
		$closureName = $reflection->getName();
		return $closureName;
	}





	// • ==== oversight → ... »
	public static function oversight($label, $message, $extra = null, $trace = null)
	{
		if (strpos($label, FRAMEWORK) === false) {
			$label = FRAMEWORK . '™ • ' . $label;
		}
		$e = '<strong>' . ucwords($label) . '</strong> | ' . $message;
		if (!is_null($extra) && $extra != '') {
			if (is_array($extra)) {
				if (count(array_filter(array_keys($extra), 'is_numeric')) === count($extra)) {
					$extra = implode(' • ', $extra);
				} else {
					$append = '';
					foreach ($extra as $key => $val) {
						if (is_callable($val)) {
							$val = self::closure($val);
						}
						$append .= $key . ': ' . $val . ' • ';
					}
					$extra = trim($append, ' • ');
				}
			}
			if (is_string($extra) || is_numeric($extra)) {
				$e .= ' → [<em>' . $extra . '</em>]';
			}
		}
		if (!empty($trace)) {
			$e .= ' <br><span style="color: red;"> {' . $trace['file'] . ':' . $trace['line'] . '}</span>';
		}
		return self::exit($e);
	}





	// • ==== callerX → report class/function unavailable »
	public static function callerX($caller, $type, &$file = null)
	{
		if ($type === 'CLASS' && !class_exists($caller) || $type === 'FUNCTION' && !function_exists($caller)) {
			return self::oversight($caller, ucfirst(strtolower($type)) . ' Unavailable!', $file);
		}
		return true;
	}

} //> end of DebugX
