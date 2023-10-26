<?php foreach($data["notes"] as $note) { ?>
    <div class="note">
        <div class="note-header">
            <h3 class="note-name">Заметка #<?php echo $note["id"]; ?></h3>
            <span class="note-date">Created at: <?php echo $note["created_at"]; ?></span>
        </div>
        <div class="note-card">
            <span class="note-text"><?php echo $note["text"]; ?></span>
        </div>
    </div>
<?php } ?>