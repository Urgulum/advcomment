<?php defined("SYSPATH") or die("No direct script access.") ?>
     <? if (!$advcomment->count()): ?>
    Noch keine Kommentare. Seinen Sie der erste.<br>
   <? endif ?>
    
    <div id="advcom-open">Kommentar schreiben</div>
    
   <div class="comment-block">
        <? foreach ($advcomment as $comment): ?>
            <div class="comment-item">
				<div class="comment-avatar">
					<img src="<?php echo advcomment::avatar($comment->Mail) ?>" alt="avatar">
				</div>
				<div class="comment-post">
        			<? if ($comment->Web == "NULL"): ?>
        			<h3><?php echo $comment->Nick ?> <span>sagte....</span></h3>
        			<? endif ?>
        			<? if ($comment->Web != "NULL"): ?>
        			<h3><a href="<?php echo $comment->Web ?>"><?php echo $comment->Nick ?></a> <span>sagte....</span></h3>
        			<? endif ?>
					<p><?php echo $comment->Text?></p>
				</div>
			</div>
        <? endforeach ?>
    </div>
    <div id="newcommentdia" title="Neuer Kommentar">
		<form id="conform" method="post" action="advcomment/save">
		 <fieldset>
			<input type="hidden" name="imgid" value="<? echo $item->id ?>">
			<label for="comment-name">Name *</label>
			<input class="text ui-corner-all" size="30" type="text" name="name" id="comment-name" placeholder="Deine Name...." required>
		
			<label for="comment-mail">Email * (versteckt)</label>
			<input class="text ui-corner-all" size="30" type="email" name="mail" id="comment-mail" placeholder="Deine E-Mail Adresse...." required>
			<label>
				<span>Webseite</span>
				<input class="text ui-corner-all" size="30" type="url" name="web" id="comment-web" placeholder="Deine Webseite....">
			</label>
			<label>
				<span>Dein Kommentar *</span>
				<textarea class="text ui-corner-all" name="comment" id="comment" cols="60" rows="10" placeholder="Schreibe deinen Kommentar hier...." required></textarea>
				<span>Das Profilbild wird von Gravatar geladen.</span><br>
			</label>
		</fieldset>
			<input type="submit" id="comsubmit" value="Kommentar Absenden">
        </form>
	</div>
	
	<div id="newcomsucess" title="Erfolg"> 
	Vielen Dank das Sie einen Kommentar verfasst haben. Dieser wird demnächst vom Seitenbetreiber freigeschalten.<br>
	Viel Spaß beim weiteren Stöbern in den Bildern.
	</div>