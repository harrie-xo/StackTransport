<?php

namespace App\Component\Packages\StackTransport;

use App\Component\Routing\Controllers\AuthController as Auths;
use App\Component\Providers\Facade\Encryption;
use App\Component\Validation\Filter\FilterFactory as Translator;
use App\Component\Support\Facades\DB;

/**
 * 
 * Author : harrieanto31@yahoo.com | Web:https://youreinspire.com
 * -----------------------------------------------------------------
 * Created : 21/Sep/2017
 * As Repsoitoriey Framework Package Components
 * This is very useful when we working with massive data through variable
 * of each view.
 * Write single function stack and less coding in view resources
 * This is convenient way to do 
 * -----------------------------------------------------------------
 * Github  :   https://github.com/harrie-xo
 * E-mail  :   harrie@youreinspire.com | harrieanto31@yahoo.com
 * 
 */

class StackTransportAuthController extends Auths
{

	/**
	 * 
	 * stackable sharing variable
	 * 
	 * @var array
	 * 
	 */
	public $stackable = [ 
			'dashboard'	=> 'dashboard',  
			'book'		=>'book',  
			'addbook'	=>'addbook',  
			'updatebook'=>'updatebook',  
			'personed',  
			'personing', 
			'lounge'	=>'lounge',  
			'login'		=> 'request',
			'logout', 
			'forget'	=>'forget',
			'insider'	=>'insider',
			'beInsider'	=>'beInsider',  
			'setting'	=>'setting',
			'notifications'	=>'notifications',  
			'profile'	=>'profile',   
			'navTransport',
	];

	/**
	 * 
	 * run over facade accessor
	 * 
	 */
	public function __construct()
	{
		//hacking parent class functionality
		//useful and work well over facades
		parent::__construct(null,  null);
		//return to the current class
		return $this;
	}

	/**
	 * 
	 * push one item to the stack
	 * 
	 * @var string $item
	 * 
	 * @return array
	 * 
	 */
	public function setItem( string $item )
	{
		return array_push($this->stackable,  $item);
	}

	/**
	 * 
	 * push multiple items to the stack
	 * 
	 * @var array $items
	 * 
	 * @return array
	 * 
	 */
	public function setItems( array $items ): Array
	{
		$this->stackable = array_merge($this->stackable,  $items);
		return $this->stackable;
	}

	/**
	 * 
	 * get stacks sharing bucket
	 * 
	 */
	public function getStacks()
	{
		return (array) $this->stackable;
	}

	/**
	 * 
	 * get single stack sharing bucket
	 * 
	 */
	public function getStack( $key )
	{
		return $this->stackable[ $key ];
	}

	/**
	 *
	 * basic auth
	 * 
	 * @param  string $CREDENTIALS
	 * 
	 * @return string
	 * 
	 */
	public function auth($CREDENTIALS = 'credentials')
	{
		return $this->auth->get($CREDENTIALS);
	}

	/**
	 * 
	 * grab local image
	 * 
	 * @param  string $compare source
	 * 
	 * @return mixed
	 * 
	 */
	public function grabLocalImage( string $compare )
	{
		//compare source atribure
		if(preg_match("/src=\"(.[^\s]+)\"/",  $compare,  $matches)) {
			//divide when match one
			$image 	 = (empty($matches[1]))?false:$matches[1];
			//clear result
			return $image;			
		}
	}

	/**
	 *
	 * purify imag tag
	 * 
	 * @param  string $compare source
	 * 
	 * @return mixed
	 * 
	 */
	public function imgpurify( string $compare )
	{
		return (new Translator)->translator( array( $compare ),  function( $next ) {
			if(preg_match("/(\<img[\sa-zA-Z0-9\_\-\"\'\=\:+](\>){0,1}[^\<]+)+/",  $next,  $matches)) {
				//divide when match one
				return str_replace( $matches[1],  '',  $next );
			}
			return false;
		});
	}

	/**
	 * 
	 * share view to view
	 * 
	 * @param  string $location view filename
	 * 
	 * @return view resources | include specific view to current view
	 * 
	 */
	public function share($filename,  $variable = null,  $data = null)
	{
		if(($variable && $data) !== null){
			return $this->view->make($filename)->with($variable, $data);
		}
		return $this->view->to($filename);
	}

	/**
	 *
	 * redirect back
	 * 
	 * @return void
	 * 
	 */
	public function back()
	{
		return $this->redirect->back();
	}

	/**
	 * 
	 * shorting some string for readable
	 * commonly used like read more on some posts
	 * 
	 * @param  string  $data    
	 * @param  integer $divisor 
	 * @param  string  $prefix  
	 * 
	 * @return string
	 * 
	 */
	public function shorter($data,  $divisor = 50,  $prefix = '...')
	{
		$spliter 	= explode(' ',  $data);
		$number 	= 0;

		return implode(' ',  array_map(function($data) use ($spliter){
			$dataAfterCutter = $spliter[$data].' ';
			return $dataAfterCutter;
		},  range($number,  $divisor))).$prefix;
	}

	/**
	 *
	 * purify html tag
	 * 
	 * @param  string $compare source
	 * 
	 * @return mixed
	 * 
	 */
	public function htmlpurify( string $compare,  $element = '\.+[^\>]{0,1}',  $more = true )
	{
		//translating each comparison by invalid element
		return (new Translator)->translator( array( $compare,  $element,  $more ),  function( $next,  $element,  $more ) {
			if(preg_match("@(\<[\sa-zA-Z0-9\_\-\"\'\=\:\.]+{$element})+@u",  $next,  $matches)) {
				//add three point at last element
				return ($more)?
					str_replace( $matches[1],  '',  $next ).str_pad("", 3,  "."):
					str_replace( $matches[1],  '',  $next );
			}

			return $next;
		});
	}

	/**
	 *
	 * no image preview
	 * 
	 * @param  string $image
	 * 
	 * @return string
	 * 
	 */
	public function noImage( string $image,  string $extension = '.jpg' )
	{
		return $this->fs->extension($this->response->serverel( true,  '/'.trim($image,  '/')),  true,  $extension );
	}

	/**
	 *
	 * prettify
	 * 
	 * @param  string $text
	 * @param  string $key
	 * 
	 * @return mixed
	 * 
	 */
	public function prettify( string $text,  string $key )
	{
		return stripslashes(str_replace('\\n',  '<br/>',  decryptor( $key,  $text )));
	}

	/**
	 * 
	 * screening data
	 * 
	 * @param  string $from
	 * 
	 * @return string
	 * 
	 */
	public function customize( string $from )
	{
		$blacklist = array( '(', ')',  ' ',  '[',  ']');
		return str_replace($blacklist,  '-',  $from);
	}

	/**
	 * 
	 * unpack/revert screening data
	 * 
	 * @param  string $from
	 * 
	 * @return string
	 * 
	 */
	public function uncustomized( string $from )
	{
		$blacklist = array( '(', ')',  '-',  '[',  ']');
		return str_replace($blacklist,  ' ',  $from);
	}

	/**
	 * 
	 * basic uuid
	 * 
	 * @param  integer $length
	 * 
	 * @return string
	 * 
	 */
	public function uuid( int $length )
	{
		return DB::temporalUuid( int $length = 32 );
	}

}