<?php

    use App\Support\Facades\StackTransport;

	/**
	 * 
	 * push one item to the stack
	 * 
	 * @var string $item
	 * 
	 * @return array
	 * 
	 */
    function setItem( $item ) {
        return StackTransport::setItem( $item );
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
    function setItems( $items ) {
        return StackTransport::setItems( $items );
	}

	/**
	 * 
	 * get stacks sharing bucket
	 * 
	 */
	function getStacks() {
        return StackTransport::getStacks();
	}

	/**
	 * 
	 * get single stack sharing bucket
	 * 
	 */
	function getStack( $key ) {
        return StackTransport::getStacks( $key );
	}

	function auth( $CREDENTIALS = 'credentials' ) {
        return StackTransport::auth( $CREDENTIALS );
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
	function grabLocalImage( string $compare )
	{
		return StackTransport::grabLocalImage( $compare );
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
	function share($filename,  $variable = null,  $data = null)
	{
		return StackTransport::share( $filename,  $variable,  $data );
	}


	function back()
	{
		return StackTransport::back();
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
	function shorter($data,  $divisor = 50,  $prefix = '...')
	{
		return StackTransport::shorter($data,  $divisor,  $prefix );
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
	function imgpurify( string $compare )
	{
		return StackTransport::imgpurify( $compare );
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
	function htmlpurify( string $compare,  $element = '\.+[^\>]{0,1}',  $more = true )
	{
		return StackTransport::htmlpurify( $compare,  $element,  $more );
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
	function noImage( string $image,  string $extension = '.jpg' )
	{
		return StackTransport::noImage( $image,  $extension );
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
	function prettify( string $text,  string $key )
	{
		return StackTransport::prettify( $text,  $key );
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
	function customize( string $from )
	{
		return StackTransport::customize( $from );
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
	function uncustomized( string $from )
	{
		return StackTransport::uncustomized( $from );
	}

	/**
	 * 
	 * basic uuid
	 * 
	 * @param  int $text 
	 * 
	 * @return string
	 * 
	 */
	function uuid( int $length )
	{
		return StackTransport::uuid( $length );
	}