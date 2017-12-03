<?php declare(strict_types=1);

namespace Mareksokol\TwigJsonTools;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Class Extension
 * @package Mareksokol\TwigJsonTools
 */
class Extension extends AbstractExtension
{
	/**
	 * Define Twig filters
	 * @example
	 * {{ string|json_decode }}
	 * {{ string|json_encode }}
	 * @return array
	 */
	public function getFilters(): array
	{
		return [
			new TwigFilter('json_decode', array($this, 'jsonDecode'))
		];
	}

	/**
	 * Define Twig functions
	 * @example
	 * {{ json_decode(string) }}
	 * {{ json_encode(string) }}
	 * @return array
	 */
	public function getFunctions(): array
	{
		return [
			'json_decode'  => new TwigFunction('json_decode', [$this, 'jsonDecode']),
			'json_encode' => new TwigFunction('json_encode', [$this, 'jsonEncode']),
		];
	}

	/**
	 * Decode JSON string
	 * @param  string $string
	 * @return object
	 */
	public function jsonDecode(string $string): object
	{
		return json_decode($string);
	}

	/**
	 * Encode an object or array to JSON
	 * @param  array $array
	 * @return string
	 */
	public function jsonEncode(array $array): string
	{
		return json_encode($array);
	}

	/** Extension name */
	public function getName(): string
	{
		return 'json_extension';
	}
}
