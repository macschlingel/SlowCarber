<?php
// set the defaults
if(!isset($vanilla_category))   $vanilla_category = '2';
if(isset($vanilla_id))          $vanilla_id = substr($page->title(), 0, 29); //String may not be longer than 30 chars
if(!isset($vanilla_id))         $vanilla_id = str_replace(array(' ','\'','"'),'-',substr($page->title(), 0, 29));
if(!isset($vanilla_url))        $vanilla_url = 'http://forum.slowcarber.de';
?>

                                    <div id="vanilla-comments"></div>
                                    <script type="text/javascript">
                                    var vanilla_forum_url = '<?php echo($vanilla_url); ?>'; // The full http url & path to your vanilla forum
                                    var vanilla_identifier = '<?php echo($vanilla_id); ?>'; // Your unique identifier for the content being commented on
                                    <?php if(isset($vanilla_discussionID)): ?>
                                    var vanilla_discussion_id = '<?php echo($vanilla_discussionID); ?>'; // Attach this page of comments to a specific Vanilla DiscussionID.
                                    <?php endif; ?>
                                    var vanilla_category_id = '<?php echo($vanilla_category); ?>'; // Create this discussion in a specific Vanilla CategoryID.
                                    
                                    /*** DON'T EDIT BELOW THIS LINE ***/
                                    (function() {
                                       var vanilla = document.createElement('script');
                                       vanilla.type = 'text/javascript';
                                       var timestamp = new Date().getTime();
                                       vanilla.src = vanilla_forum_url + '/js/embed.js';
                                       (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(vanilla);
                                    })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the comments.</a></noscript>
