        <footer>

        	<div class="pull-left">

				Admin CMS &copy; Copyright <?= date("Y")?>. Version: 3.1

        	</div>

        	<div class="pull-right">

        		by <cite><a href="http://itsgroup.vn" target="_blank" style="color: #e67e22;">iTS Group</a></cite>

        	</div>

        	<div class="clearfix"></div>

        </footer>

    </div>

</div>



<!-- jQuery -->

<script src="<?= my_library::admin_js()?>jquery.min.js"></script>

<script src="<?= my_library::admin_js()?>bootstrap.min.js"></script>

<script src="<?= my_library::admin_js()?>fastclick.js"></script>

<script src="<?= my_library::admin_js()?>nprogress.js"></script>

<script src="<?= my_library::admin_js()?>custom.min.js"></script>

<script src="<?= my_library::admin_js()?>pnotify.js"></script>

<script src="<?= my_library::admin_js()?>sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script src="<?= my_library::admin_js()?>myadmin.js"></script>

<?php if (!empty($extraJs)): ?>

	<?php foreach ($extraJs as $value): ?>

		<script src="<?= my_library::admin_js().$value?>"></script>

	<?php endforeach ?>

<?php endif ?>

<?php $notify = $this->session->userdata('notify'); ?>

<?php if (isset($notify)): ?>

	<?php $this->session->unset_userdata('notify'); ?>

	<script>

		$(document).ready(function(){

			new PNotify({

				title: '<?= $notify['title']?>',

				text: '<?= $notify['text']?>',

				type: '<?= $notify['type']?>',

				styling: 'bootstrap3'

			});

		});

	</script>

<?php endif ?>

</body>

</html>