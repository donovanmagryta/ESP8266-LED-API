 < ? p h p   
   i f ( i s s e t ( $ _ P O S T [ " l e d n u m " ] ) )   {   
 $ l e d n u m   =   $ _ P O S T [ " l e d n u m " ] ; 
$lednum = ($lednum - 1);
 $ u r l   =   $ _ P O S T [ " u r l " ] ; 
 $ f i n d   =   $ _ P O S T [ " f i n d " ] ; 
 $ c a l c d o   =   $ _ P O S T [ " matches" ] ; 
   $ f i l e   =   f o p e n ( " p r o g r a m . j s o n " , " a + " )   o r   d i e   ( " f i l e   n o t   f o u n d " ) ;   
 $ j s o n   =   f i l e _ g e t _ c o n t e n t s ( ' p r o g r a m . j s o n ' ) ; 
 $ d a t a   =   j s o n _ d e c o d e ( $ j s o n ,   t r u e ) ;   
 $ d a t a [ $ l e d n u m ] [ $ u r l ]   =   $ u r l ; 
 $ d a t a [ $ l e d n u m ] [ $ f i n d ] = $ f i n d ; 
 $ d a t a [ $ l e d n u m ] [ $ c a l c d o ] = $ c a l c d o ; 
 $ n e w j s o n   =   j s o n _ e n c o d e ( $ d a t a ) ;   f i l e _ p u t _ c o n t e n t s ( ' p r o g r a m . j s o n ' ,   $ n e w j s o n ) ;   f c l o s e ( $ f i l e ) ; 
 $message = (  $ l e d n u m   .   $ u r l   .   $ f i n d   .   $ c a l c d o )  ; 
 } 
 e l s e   { 
 e c h o   "< h t m l >   < b o d y >   < f o r m   a c t i o n = " "   m e t h o d = " p o s t " >   < ? p h p   e c h o   $ m e s s a g e ;   ? >   < i n p u t   t y p e = " t e x t "   n a m e = " lednum" / >
<input type ="text" na me="url"/>
<input type ="text" name="find"/>
<input type="text" name="matches"/>
< i n p u t   t y p e = " s u b m i t "   n a m e = " S u b m i t B u t t o n " / >   < / f o r m >   < / b o d y >   < / h t m l > ";
}
 ? > 
 
 
 
