<div id="content">

	<!-- 3. Magazine Main Content -->

	<div id="main_content">
		<h1><a href="<?=URIMaker::article($this->article)?>" rel="bookmark"><?= $this->article->getTitle() ?></a></h1>
		<p>
			<?= $this->article->getCreatedFormatted() ?>  by
			<?
			foreach ($this->article->users() as $user) :
			echo $user->getName().' ';
			endforeach;
			?> |
			<? echo '<a href="'.URIMaker::comment($this->article).'"> comments ('.count($this->article->commentsPublished()).') </a>'; ?>
		</p>
		<p>
			<? if ($this->article->imageExists()) : ?>
			<img src="<?= URIMaker::fromBasePath($this->article->imagePath()) ?>" width="100" align="left">
			<? ?>
			<?= $this->article->getSummary() ?>
		</p>
		<h3>Comments</h3>
		  <? if (isset($this->advice)) :?>
                <b><?= $this->advice ?></b>
          <? endif; ?>

            <? foreach($this->article->commentsPublished()  as $comment) : ?>

            <p><small><?= $comment->getCreatedFormatted() ?></small> by
                    <?= $comment->getSignature() ?>
            </p>

            <p>

                    <?= $comment->getTitle() ?><br />

                    <?= $comment->getBody() ?>

            </p>

            <? endforeach; ?>

            <p>
            <form name="newcomment" method="post" action="<?= URIMaker::comment($this->article) ?>">
                Title<br />
                <input type="text" name="Title" value=""/><br />
                Body<br />
                <textarea name="Body" rows="4" cols="40"></textarea><br />
                Signature<br />
                <input type="text" name="Signature" value=""/><br />
                <input type="submit" value="Ok" name="Ok" />
            </form>
            </p>
	</div>

<!-- 4. Sidebar -->

<?php include("sidebar.php");?>

</div>