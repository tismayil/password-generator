<?php
	set_time_limit(0);
	
	#####################################################################################
	#####################################################################################
	##
	##  (c) 2018.07.28
	##  Authors : Ismayil Tahmazov , Oguzhan Inan
	##  
	##
	#####################################################################################
	#####################################################################################
	
	$list = [ 'victim information #1' , 'victim information #2' , 'victim information #3' ];
	
	$_sesli_harfler_buyuk = preg_split('//u' , 'aeıioöuü' , -1 , PREG_SPLIT_NO_EMPTY); 
	$_sesli_harfler_kucuk = preg_split('//u' , 'AEIİOÖUÜ' , -1 , PREG_SPLIT_NO_EMPTY); 
	$_rakamlar_harf_karsiligi = [ 'a' => 4 , 'e' => 3 , 'l' => 1 , 'o' => 0 , 'i' => '!' ];
	$_birlestirme_ekleri = [ '_' , '-' , '@' , '!' , '.' , ',' , '' ];

	$_passwords = _init( $list );
	$data = implode( "\n" , $_passwords );
	file_put_contents( 'list.txt' , $data );
	function _init( $list )
	{
		Global $_SERVER;
		$_1 = _combine( $list );
		$_2 = _merge( $_1 );
		
		$_SERVER['_GENERATED'] = [];
		
		$_GENERATED = array_merge( $_1 , $_2 );
		
		array_walk( $_GENERATED , '_values' );
		
		return $_SERVER['_GENERATED'];
		
	}
	
	function _values( &$value , $key )
	{
		Global $_SERVER;
		$return = [];
		if( is_array( $value ) )
		{
			array_walk( $value , '_values' );
		}
		else
		{
			$_SERVER['_GENERATED'][] = $value;
		}
	}
	
	function _merge( $data )
	{
		$return = [];
		for( $i = 0; $i < count($data); $i++ )
		{
			$secili_array = $data[$i];
			for( $j = 0; $j < count( $secili_array ); $j++ )
			{
				$secili_eleman = $secili_array[$j];
				for( $k = $i+1; $k < count( $data ); $k++ )
				{
					$birlesecek_array = $data[$k];
					for( $l = 0; $l < count( $birlesecek_array ); $l++ )
					{
						$birlesecek_eleman = $birlesecek_array[$l];
						$return[] = _keyword_merge( $secili_eleman , $birlesecek_eleman );
					}
				}
			}
		}
		return $return;
	}
	
	
	function _combine( $list )
	{
		$return = [];
			#1
			for( $i = 0; $i < count( $list ); $i++ )
			{
				$_1 = _keyword( $list[$i] );
				$_2 = _clear_sesli_harf( $list[$i] );
				$_3 = _harf_rakamlama( $list[$i] );
				
				$return[] = array_unique(array_merge( $_1 , $_2 , $_3 ));				
			}
			
		return $return;
	}
	
	
	function _keyword_merge( $_1 , $_2 )
	{
		Global $_birlestirme_ekleri;
		$return = [];
		foreach( $_birlestirme_ekleri as $ek )
		{
			$return[] = $_1.$ek.$_2;
			$return[] = $_2.$ek.$_1;
			$return[] = $ek.$_2.$_1;
			$return[] = $ek.$_1.$_2;
			$return[] = $_1.$_2.$ek;
			$return[] = $_2.$_1.$ek;
			$return[] = $_2.$ek.$_1.$ek;
			$return[] = $_1.$ek.$_2.$ek;
			$return[] = $ek.$_2.$ek.$_1.$ek;
			$return[] = $ek.$_1.$ek.$_2.$ek;
		}
		return $return;
	}

	function _harf_rakamlama( $keyword )
	{
		Global $_rakamlar_harf_karsiligi;
		$keyword = strtolower( $keyword );
		$keys = array_keys( $_rakamlar_harf_karsiligi );
		$values = array_values( $_rakamlar_harf_karsiligi );
		$keyword = str_replace( $keys , $values , $keyword );
		return [ $keyword , strtoupper( $keyword ) ];
	}	
	
	function _clear_sesli_harf( $keyword )
	{
		Global $_sesli_harfler_buyuk , $_sesli_harfler_kucuk;
		if( is_numeric( $keyword ) ) return [];
		$return = [];
		$return[] = str_replace( array_merge($_sesli_harfler_buyuk , $_sesli_harfler_kucuk ) , '' , $keyword );
		return $return;
	}
	
	function _keyword( $keyword )
	{
		$return = [];
		$_islenen = 0;
		for( $i = 0; $i < strlen( $keyword ); $i++ )
		{
			$keyword = strtolower( $keyword );
			$keyword[$i] = ucwords( $keyword[$i] );
			$return[] = $keyword;
		}
		
		$return[] = strtolower( $keyword );
		$return[] = strtoupper( $keyword );
		
		return $return;
	}
	
