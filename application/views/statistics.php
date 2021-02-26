<?php 
// echo "<pre>";print_r(count(explode(',', $result1[0]['upvote'])));die;
$medal1     = base_url().'icons/medal1.png';
$medal2     = base_url().'icons/medal2.png';
$medal3     = base_url().'icons/medal3.png';
$datetime   =   date('Y-m-d H:i:s');
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Statistics</h4>
                        <p class="advertise_address"></p><br>
                    </div>
                    <div class="content">
                        <form method="post" class="form1" enctype="multipart/form-data">
                            
                           <div class="Stat_sec">
                                <div class="stats_blog">
                                    <div class="blog_sec">
                                        <h2>Progress of posts for <?php echo date('F',strtotime('first day of -1 month')); ?></h2>
                                        <?php if (count($result) > 0) { ?>
                                        <div class="rank_sec">
                                            <div class="rank_img">
                                                <img src="<?php echo $medal1; ?>">
                                            </div>
                                            <div class="bl_con">
                                               <p><?php echo $result[0]['username']; ?> -</p>
                                               <p><?php echo date('d-m-Y', strtotime($result[0]['created_at'])) ?></p>
                                               <br>
                                               <p><div class="posttitle"><?php echo $result[0]['post_title']; ?></p>
                                               <br>
                                               <p><?php echo count(array_filter(explode(',', $result[0]['upvote']))); ?> - <?php echo count(array_filter(explode(',', $result[0]['downvote']))); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rank_sec">
                                        <div class="rank_img">
                                            <img src="<?php echo $medal2; ?>">
                                        </div>
                                        <div class="bl_con">
                                           <p><?php echo isset($result[1]['username']) ? $result[1]['username'] : ''; ?> -</p>
                                           <p><?php echo isset($result[1]['created_at']) ? date('d-m-Y', strtotime($result[1]['created_at'])) : '' ?></p>
                                           <br>
                                           <p><?php echo isset($result[1]['post_title']) ? $result[1]['post_title'] : ''; ?></p>
                                           <br>
                                           <p><?php echo isset($result[1]['upvote']) ? count(array_filter(explode(',', $result[1]['upvote']))) : ''; ?> - <?php echo isset($result[1]['upvote']) ? isset($result[1]['downvote']) ? count(array_filter(explode(',', $result[1]['downvote']))): '0' : ''; ?></p>
                                        </div>
                                       </div>
                                    <div class="rank_sec">
                                        <div class="rank_img">
                                            <img src="<?php echo $medal3; ?>">
                                        </div>
                                        <div class="bl_con">
                                           <p><?php echo isset($result[2]['username']) ? $result[2]['username'] : ''; ?> -</p>
                                           <p><?php echo isset($result[2]['created_at']) ? date('d-m-Y', strtotime($result[2]['created_at'])) : ''; ?></p>
                                           <br>
                                           <p><?php echo isset($result[2]['post_title']) ? $result[2]['post_title'] : ''; ?></p>
                                           <br>
                                           <p><?php echo isset($result[2]['upvote']) ? count(array_filter(explode(',', $result[2]['upvote']))) : ''; ?> - <?php echo isset($result[2]['upvote']) ? isset($result[2]['downvote']) ? count(array_filter(explode(',', $result[2]['downvote']))): '0' : ''; ?></p>
                                        </div>
                                       </div>
                                   <?php }else{ ?>
                                    <p>No post yet</p>
                                   <?php } ?>
                                    </div>
                                </div>
                              <div class="stats_blog">
                                <div class="blog_sec">
                                    <h2>Top posts of <?php echo date('F',strtotime('first day of -2 month')); ?></h2>
                                    <?php if (count($result1) > 0) { ?>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal1; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result1[0]['postuser']) ? $result1[0]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result1[0]['postdate']) ? date('d-m-Y', strtotime($result1[0]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result1[0]['post_title']) ? $result1[0]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result1[0]['upvote']) ? $result1[0]['upvote'] : ''; ?> - <?php echo isset($result1[0]['downvote']) ? $result1[0]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal2; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result1[1]['postuser']) ? $result1[1]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result1[1]['postdate']) ? date('d-m-Y', strtotime($result1[1]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result1[1]['post_title']) ? $result1[1]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result1[1]['upvote']) ? $result1[1]['upvote'] : ''; ?> - <?php echo isset($result1[1]['downvote']) ? $result1[1]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal3; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result1[2]['postuser']) ? $result1[2]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result1[2]['postdate']) ? date('d-m-Y', strtotime($result1[2]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result1[2]['post_title']) ? $result1[2]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result1[2]['upvote']) ? $result1[2]['upvote'] : ''; ?> - <?php echo isset($result1[2]['downvote']) ? $result1[2]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                   <?php }else{ ?>
                                    <p>No post yet</p>
                                   <?php } ?>
                                </div>
                            </div>
                            <div class="stats_blog">
                                <div class="blog_sec">
                                    <h2>Top posts of <?php echo date('F',strtotime('first day of -3 month')); ?></h2>
                                    <?php if (count($result2) > 0) { ?>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal1; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result2[0]['postuser']) ? $result2[0]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result2[0]['postdate']) ? date('d-m-Y', strtotime($result2[0]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result2[0]['post_title']) ? $result2[0]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result2[0]['upvote']) ? $result2[0]['upvote'] : ''; ?> - <?php echo isset($result2[0]['downvote']) ? $result2[0]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal2; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result2[1]['postuser']) ? $result2[1]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result2[1]['postdate']) ? date('d-m-Y', strtotime($result2[1]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result2[1]['post_title']) ? $result2[1]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result2[1]['upvote']) ? $result2[1]['upvote'] : ''; ?> - <?php echo isset($result2[1]['downvote']) ? $result2[1]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal3; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result2[2]['postuser']) ? $result2[2]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result2[2]['postdate']) ? date('d-m-Y', strtotime($result2[2]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result2[2]['post_title']) ? $result2[2]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result2[2]['upvote']) ? $result2[2]['upvote'] : ''; ?> - <?php echo isset($result2[2]['downvote']) ? $result2[2]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                   <?php }else{ ?>
                                    <p>No post yet</p>
                                   <?php } ?>
                                </div>
                            </div>
                            <div class="stats_blog">
                                <div class="blog_sec">
                                    <h2>Top posts of <?php echo date('F',strtotime('first day of -4 month')); ?></h2>
                                    <?php if (count($result3) > 0) { ?>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal1; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result3[0]['postuser']) ? $result3[0]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result3[0]['postdate']) ? date('d-m-Y', strtotime($result3[0]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result3[0]['post_title']) ? $result3[0]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result3[0]['upvote']) ? $result3[0]['upvote'] : ''; ?> - <?php echo isset($result3[0]['downvote']) ? $result3[0]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal2; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result3[1]['postuser']) ? $result3[1]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result3[1]['postdate']) ? date('d-m-Y', strtotime($result3[1]['postdate'])) : '';?></p>
                                       <br>
                                       <p><?php echo isset($result3[1]['post_title']) ? $result3[1]['post_title'] : ''; ?></p>
                                       <br>
                                        <p><?php echo isset($result3[1]['upvote']) ? $result3[1]['upvote'] : ''; ?> - <?php echo isset($result3[1]['downvote']) ? $result3[1]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal3; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result3[2]['postuser']) ? $result3[2]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result3[2]['postdate']) ? date('d-m-Y', strtotime($result3[2]['postdate']))  : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result3[2]['post_title']) ? $result3[2]['post_title'] : ''; ?></p>
                                       <br>
                                        <p><?php echo isset($result3[2]['upvote']) ? $result3[2]['upvote'] : ''; ?> - <?php echo isset($result3[2]['downvote']) ? $result3[2]['downvote'] : ''; ?></p>
                                    </div>
                                     <?php }else{ ?>
                                    <p>No post yet</p>
                                   <?php } ?>
                                </div>
                            </div>
                            <div class="stats_blog">
                                <div class="blog_sec">
                                    <h2>Top posts of <?php echo date('F',strtotime('first day of -5 month')); ?></h2>
                                    <?php if (count($result4) > 0) { ?>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal1; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result4[0]['postuser']) ? $result4[0]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result4[0]['postdate']) ? date('d-m-Y', strtotime($result4[0]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result4[0]['post_title']) ? $result4[0]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result4[0]['upvote']) ? $result4[0]['upvote'] : ''; ?> - <?php echo isset($result4[0]['downvote']) ? $result4[0]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal2; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result4[1]['postuser']) ? $result4[1]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result4[1]['postdate']) ? date('d-m-Y', strtotime($result4[1]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result4[1]['post_title']) ? $result4[1]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result4[1]['upvote']) ? $result4[1]['upvote'] : ''; ?> - <?php echo isset($result4[1]['downvote']) ? $result4[1]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal3; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result4[2]['postuser']) ? $result4[2]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result4[2]['postdate']) ? date('d-m-Y', strtotime($result4[2]['postdate'])) : '' ?></p>
                                       <br>
                                       <p><?php echo $result4[2]['post_title']; ?></p>
                                       <br>
                                       <p><?php echo isset($result4[2]['upvote']) ? $result4[2]['upvote'] : ''; ?> - <?php echo isset($result4[2]['downvote']) ? $result4[2]['downvote'] : ''; ?></p>
                                    </div>
                                     <?php }else{ ?>
                                    <p>No post yet</p>
                                   <?php } ?>
                                </div>
                            </div>
                            <div class="stats_blog">
                                <div class="blog_sec">
                                    <h2>Top posts of <?php echo date('F',strtotime('first day of -6 month')); ?></h2>
                                    <?php if (count($result5) > 0) { ?>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal1; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result5[0]['postuser']) ? $result5[0]['postuser'] : ''; ?> -</p>
                                       <p><?php echo  isset($result5[0]['postdate']) ? date('d-m-Y', strtotime($result5[0]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result5[0]['post_title']) ? $result5[0]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result5[0]['upvote']) ? $result5[0]['upvote'] : ''; ?> - <?php echo isset($result5[0]['downvote']) ? $result5[0]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal2; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result5[1]['postuser']) ? $result5[1]['postuser'] : ''; ?> -</p>
                                       <p><?php echo isset($result5[1]['postdate']) ? date('d-m-Y', strtotime($result5[1]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result5[1]['post_title']) ? $result5[1]['post_title'] : ''; ?></p>
                                       <br>
                                        <p><?php echo isset($result5[1]['upvote']) ? $result5[1]['upvote'] : ''; ?> - <?php echo isset($result5[1]['downvote']) ? $result5[1]['downvote'] : ''; ?></p>
                                    </div>
                                   </div>
                                <div class="rank_sec">
                                    <div class="rank_img">
                                        <img src="<?php echo $medal3; ?>">
                                    </div>
                                    <div class="bl_con">
                                       <p><?php echo isset($result5[2]['postuser']) ? $result5[2]['postuser']: ''; ?> -</p>
                                       <p><?php echo isset($result5[2]['postdate']) ? date('d-m-Y', strtotime($result5[2]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result5[2]['post_title']) ? $result5[2]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result5[2]['upvote']) ? $result5[2]['upvote'] : ''; ?> - <?php echo isset($result5[2]['downvote']) ? $result5[2]['downvote'] : ''; ?></p>
                                    </div>
                                    <?php }else{ ?>
                                    <p>No post yet</p>
                                   <?php } ?>
                                </div>
                            </div>
                             <div class="stats_blog">
                                <div class="blog_sec">
                                    <h2>Highest voted posts for the Month</h2>
                                    <?php if (count($result6) > 0) { ?>
                                <div class="rank_sec">
                                    <div class="bl_con">
                                       <p><?php echo isset($result6[0]['postuser']) ? $result6[0]['postuser'] : ''; ?> -</p>
                                       <p><?php echo  isset($result6[0]['postdate']) ? date('d-m-Y', strtotime($result6[0]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result6[0]['post_title']) ? $result6[0]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result6[0]['upvote']) ? $result6[0]['upvote'] : ''; ?> - <?php echo isset($result6[0]['downvote']) ? $result6[0]['downvote'] : ''; ?></p>
                                       <br>
                                       <p>Score <?php echo isset($result6[0]['post_calculation']) ? $result6[0]['post_calculation'] : ''; ?></p>
                                    </div>
                                   </div>
                                    <?php }else{ ?>
                                    <p>No post yet</p>
                                   <?php } ?>
                                </div>
                            </div>
                            <div class="stats_blog">
                                <div class="blog_sec">
                                    <h2>Highest voted posts for the Week</h2>
                                    <?php if (count($result7) > 0) { ?>
                                <div class="rank_sec">
                                    <div class="bl_con">
                                       <p><?php echo isset($result7[0]['postuser']) ? $result7[0]['postuser'] : ''; ?> -</p>
                                       <p><?php echo  isset($result7[0]['postdate']) ? date('d-m-Y', strtotime($result7[0]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result7[0]['post_title']) ? $result7[0]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result7[0]['upvote']) ? $result7[0]['upvote'] : ''; ?> - <?php echo isset($result7[0]['downvote']) ? $result7[0]['downvote'] : ''; ?></p>
                                       <br>
                                       <p>Score <?php echo isset($result7[0]['post_calculation']) ? $result6[0]['post_calculation'] : ''; ?></p>
                                    </div>
                                   </div>
                                   <?php }else{ ?>
                                    <p>No post yet</p>
                                   <?php } ?>
                                </div>
                            </div>
                            <div class="stats_blog">
                                <div class="blog_sec">
                                    <h2>Highest voted posts for the Year</h2>
                                    <?php if (count($result8) > 0) { ?>
                                <div class="rank_sec">
                                    <div class="bl_con">
                                       <p><?php echo isset($result8[0]['postuser']) ? $result8[0]['postuser'] : ''; ?> -</p>
                                       <p><?php echo  isset($result8[0]['postdate']) ? date('d-m-Y', strtotime($result8[0]['postdate'])) : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result8[0]['post_title']) ? $result8[0]['post_title'] : ''; ?></p>
                                       <br>
                                       <p><?php echo isset($result8[0]['upvote']) ? $result8[0]['upvote'] : ''; ?> - <?php echo isset($result8[0]['downvote']) ? $result8[0]['downvote'] : ''; ?></p>
                                       <br>
                                        <p>Score <?php echo isset($result8[0]['post_calculation']) ? $result8[0]['post_calculation'] : ''; ?></p>
                                    </div>
                                   </div>
                                   <?php }else{ ?>
                                    <p>No post yet</p>
                                   <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <h4 class="title">Note:</h4><p>Progress of posts will be published on end of every day.</p> <p>Top posts will be published on end of every month.</p>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</div>