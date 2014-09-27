<?php get_header(); ?>
<div id="zan-bodyer">
	<div class="container">
		<div class="row">
			<div id="mainstay" class="col-md-8">
				<div id="ie-warning" class="alert alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="fa fa-warning"></i> 请注意，<?php bloginfo('name'); ?>并不支持低于IE8的浏览器，为了获得最佳效果，请下载最新的浏览器，推荐下载 <i class="fa fa-compass"></i> Chrome浏览器
				</div>
				<div class="well fade in">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					欢迎访问 <a target="_blank" href="http://www.jevylee.com/">JevyLee</a> 提供的博客，博主是一个略带文艺范的程序员，喜欢<strong>编程，旅游，音乐，读书,关注互联网创业</strong>。这是他的博客，是一个值得收藏的网站。本博客旨在<strong>记录经验，分享知识，表达价值</strong>。 <i class="fa fa-smile-o"></i>如您喜欢本博客，欢迎邮箱订阅-----
					<a target="_blank" href="http://list.qq.com/cgi-bin/qf_invite?id=82a6d592848bac514ec01b5e81275cd43c78c0dd5d7a7f7c"><img border="0" alt="填写您的邮件地址，订阅我们的精彩内容：" src="http://rescdn.list.qq.com/zh_CN/htmledition/images/qunfa/manage/picMode_light_s.png" /></a>
					
					<div>
					博主微博链接:<wb:follow-button uid="1890392930" type="red_3" width="100%" height="24" ></wb:follow-button>
					</div>
				</div>

				<!-- 公告 -->
				<?php if(get_option( 'zan_notice' ) && is_home()){ ?>
					<div class="well fade in">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo stripslashes( get_option( 'zan_notice' ) ); ?>
					 </div>
			    
				<?php } ?>
				<!-- 公告结束 -->

				<!-- 广告 -->
			    <?php if ( get_option( 'zan_content_top_ad' ) ) : ?>
			      <div class="ad hidden-xs">
			        <?php echo stripslashes( get_option( 'zan_content_top_ad' ) ); ?>
			      </div>
			    <?php endif; ?>
			    <!-- 广告结束 -->

				<!-- 幻灯片-->
				<?php ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( '幻灯片位置' ) ) ? true : false; ?> 
				<!-- 幻灯片结束-->

				<!-- 内容主体 -->
				<div id="article-list">
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<?php get_template_part( 'includes/post-format/content', get_post_format() ); ?>
					<?php endwhile; ?>
				</div>
				<!-- 内容主体结束 -->

				<!-- 广告 -->
		    <?php if ( get_option( 'zan_content_down_ad' ) ) : ?>
		      <div class="ad hidden-xs">
		        <?php echo stripslashes( get_option( 'zan_content_down_ad' ) ); ?>
		      </div>
		    <?php endif; ?>
		    <!-- 广告结束 -->

				<!-- 分页 -->
				<?php if(get_option( 'zan_page' )==1) { ?>
					<?php zan_page('auto'); ?>
				<?php } else { ?>
					<?php zan_page('manual'); ?>
				<?php } ?>
				<!-- 分页结束 -->

			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>