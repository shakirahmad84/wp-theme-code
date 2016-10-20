<?php comments_template(); ?>




<?php comments_popup_link( $zero, $one, $more, $css_class, $none ); ?> 

$zero     =    Text to display when there are no comments. 
$one      =    Text to display when there is one comment.      
$more     =    Text to display when there are more than one comments. '%' is replaced by the number of comments,
$css_class=    CSS (stylesheet) class for the link. 
$none     =    Text to display when comments are disabled. 

<?php
  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');
?>