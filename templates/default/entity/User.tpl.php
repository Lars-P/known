<?php

    if (empty($vars['user']) && !empty($vars['object'])) {
        $vars['user'] = $vars['object'];
    }

?>
<div class="row profile h-card">
    <div class="col-md-8 col-md-offset-2">
        <!--<div class="row visible-sm">
            <div class="col-md-2">
                <div style="margin-bottom: 2em; margin-top: -2em; text-align: center">
                    <p>
                        <?= $this->draw('entity/User/profile/contact') ?>
                    </p>

                    <p style="margin-bottom: 2em" class="clearall"></p>
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col-md-4 namebadge">
                <p>
                    <a href="<?= $vars['user']->getDisplayURL() ?>" class="u-url icon-container"><img class="u-photo"
                                                                                               src="<?= $vars['user']->getIcon() ?>"/></a>
                </p>

                        <?php

                            if ($vars['user']->canEdit() && $vars['user']->getUUID() == \Idno\Core\Idno::site()->session()->currentUserUUID()) {
                                // If you're wondering, this is wrapped in an h1 tag to keep it aligned with
                                // the user's name over in the next div. TODO: find a better way to do this
                                // that retains visual consistency.
                                ?>
                                <h1><a href="<?= $vars['user']->getEditURL() ?>" class="btn btn-default">Edit profile</a></h1>
                            <?php

                            }

                        ?>
                    </div>
            
            <div class="col-md-8 namebadge-profile">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="p-profile">
                            <a href="<?= $vars['user']->getDisplayURL() ?>"
                               class="u-url p-name fn"><?= htmlentities(strip_tags($vars['user']->getTitle()), ENT_QUOTES, 'UTF-8') ?></a>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="e-note"><?php
                                $description = $vars['user']->getDescription();
                                if (!empty($description)) {
                                    echo '<div class="highlightedText">' . $this->autop($vars['user']->getDescription()) . '</div>';
                                } else if ($vars['user']->getUUID() == \Idno\Core\Idno::site()->session()->currentUserUUID()) {
                                    ?>
                                    <p class="highlightedText">
                                        <?= \Idno\Core\Idno::site()->language()->_("A profile helps you describe yourself to other people on the site and on the web. You haven't described yourself yet."); ?>
                                        <a href="<?= $vars['user']->getDisplayURL() ?>/edit/"><?= \Idno\Core\Idno::site()->language()->_('Click here to fill in your profile information.'); ?></a>
                                    </p>
                                <?php
                                }
                            ?></div>

                        <?= $this->draw('entity/User/profile/fields') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>