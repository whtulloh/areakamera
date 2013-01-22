<!-- external javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery-1.7.2.min.js"></script>
<!-- jQuery UI -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery-ui-1.8.21.custom.min.js"></script>

<script src="<?php echo base_url(); ?>res/js/admin-my.js"></script>

<!-- transition / effect library -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-transition.js"></script>
<!-- alert enhancer library -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-alert.js"></script>
<!-- modal / dialog library -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-modal.js"></script>
<!-- custom dropdown library -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-dropdown.js"></script>
<!-- scrolspy library -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-scrollspy.js"></script>
<!-- library for creating tabs -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-tooltip.js"></script>
<!-- popover effect library -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-popover.js"></script>
<!-- button enhancer library -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-button.js"></script>
<!-- accordion library (optional, not used in demo) -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-collapse.js"></script>
<!-- carousel slideshow library (optional, not used in demo) -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-carousel.js"></script>
<!-- autocomplete library -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-typeahead.js"></script>
<!-- tour library -->
<script src="<?php echo base_url(); ?>res/js/usman/bootstrap-tour.js"></script>
<!-- library for cookie management -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.cookie.js"></script>
<!-- calander plugin -->
<script src='<?php echo base_url(); ?>res/js/usman/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='<?php echo base_url(); ?>res/js/usman/jquery.dataTables.min.js'></script>

<!-- chart libraries start -->
<script src="<?php echo base_url(); ?>res/js/usman/excanvas.js"></script>
<script src="<?php echo base_url(); ?>res/js/usman/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>res/js/usman/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url(); ?>res/js/usman/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>res/js/usman/jquery.flot.resize.min.js"></script>
<!-- chart libraries end -->

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.chosen.min.js"></script>
<!-- checkbox, radio, and file input styler -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.uniform.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.colorbox.min.js"></script>
<!-- rich text editor library -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.cleditor.min.js"></script>
<!-- notification plugin -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.noty.js"></script>
<!-- file manager library -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.elfinder.min.js"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url(); ?>res/js/usman/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url(); ?>res/js/usman/charisma.js"></script>

<script type="text/javascript">
$(document).ready(function()
{
    $(".kategoriparent").change(function()
    {
        var id=$(this).val();
        var dataString = 'id='+ id;
        
        $.ajax
        ({
            type: "POST",
            url: "<?php echo base_url();?>admin/child_query",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $(".kategorichild").html(html);
            } 
        });

    });

});
</script>