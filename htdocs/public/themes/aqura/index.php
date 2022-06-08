<div class="page-content py-5">
    <section class="section-basic pt-5">
        <div class="container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<?php $session = session();
						if ($session->getFlashdata('error'))
						{
							echo alert('danger', 'Error', $session->getFlashdata('message'));
						}
						elseif ($session->getFlashdata('message'))
						{
							echo alert('success', 'Success', $session->getFlashdata('message'));
						} 
						?>
					</div>
	    		</div>
	  		</div>
			<?php  echo  $content; ?>
		</div>
	</section>
</div>
			