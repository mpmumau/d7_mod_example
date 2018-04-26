<?php foreach($members as $member) : ?>
    <div class='member-wrapper'>
        <p class='member-pilot-wings'><img src='<?php print $medals_metadata['pilot_wings_image']; ?>'/></p>
        <p class='member-rank-image'><img src='<?php print $medals_metadata['rank_images'][$member['primary_rank']]; ?>'/></p>


        <p class='member-name'><?php print $member['name']; ?></p>
        <p class='member-rank'><?php print $member['ranks']; ?></p>

        <div class='medals-wrapper'>
            <?php foreach($medals_metadata['medals'] as $medal_type => $metadata): ?>
                <?php if(!empty($member['medals'][$medal_type]['is_awarded']) && $member['medals'][$medal_type]['is_awarded']) :?>
                    <div class='medal-wrapper'>
                        <img src="<?php print $metadata['image']; ?>" alt='<?php print $metadata['desc']; ?>' title='<?php print $metadata['desc']; ?>'/>

                        <?php if($member['medals'][$medal_type]['stars']['silver'] > 0 || $member['medals'][$medal_type]['stars']['bronze'] > 0) : ?>
                            <div class='member-medal-stars-wrapper'>
                                <?php for($i = 0; $i < $member['medals'][$medal_type]['stars']['silver']; $i++) :?>
                                    <img src='<?php print $medals_metadata['star_images']['five_star']; ?>'/>
                                <?php endfor; ?>

                                <?php for($i = 0; $i < $member['medals'][$medal_type]['stars']['bronze']; $i++) :?>
                                    <img src='<?php print $medals_metadata['star_images']['one_star']; ?>'/>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php $member['first_row_offset']--; ?>
                    <?php if($member['first_row_offset'] == 0): ?>
                        <br/>
                    <?php endif; ?>

                <?php endif; ?>

            <?php endforeach; ?>
        </div>

        <p class='member-joined'>Joined <?php print $member['joined']; ?></p>
        <p class='member-years-service'><?php print $member['years_of_service']; ?></p>

        <?php if(!empty($member['description'])): ?>
            <p class='member-rank'><?php print $member['description']; ?></p>
        <?php endif; ?>

        <div class="grey-divider"></div>
    </div>
<?php endforeach; ?>