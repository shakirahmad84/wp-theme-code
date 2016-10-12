How to dynamic search

<input type="text" value="search...">   

•	Wrap  above code into below form and Add name=”s” to input like below:

<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
    <input name=”s”  type="text" value="search...">   
</form>


•	To call default search 

<?php  get_search_form(); ?>