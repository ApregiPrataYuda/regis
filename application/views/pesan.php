<?php if ($this->session->has_userdata('success')) { ?> 
<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><?=strip_tags(str_replace('</p>','',$this->session->flashdata('success')));?></h6>
</div>
<?php } ?>


<?php if ($this->session->has_userdata('error')) { ?> 
<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><?=strip_tags(str_replace('</p>','',$this->session->flashdata('error')));?></h6>
</div>
<?php } ?>



<?php if ($this->session->has_userdata('nonvalid')) { ?> 
<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i>!</h4><?=strip_tags(str_replace('</p>','',$this->session->flashdata('nonvalid')));?>
</div>
<?php } ?>