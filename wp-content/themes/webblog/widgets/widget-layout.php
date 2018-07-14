<?php

//recent blog post
// start class - Webblog_Recent_Post_Widget
if( !class_exists( 'Webblog_Recent_Post_Widget' ) ) :

	class Webblog_Recent_Post_Widget extends WP_Widget {
	
	    /**
	     * Sets up the widgets name etc
	     */
		public function __construct() {
			parent::__construct(
				'webblog_recent_blog_post', // Base ID
				esc_html__( 'Recent Blog Post - Webblog', 'webblog' ), // Name
				array( 'description' => esc_html__( 'Recent Blog Post', 'webblog' ), ) // Args
			);
		}
		
		/**
	      * Outputs the options form on admin
	      *
	      * @param array $instance The widget options
	      */
		public function form( $instance ) {
		 // outputs the options form on admin
		$webblog_blog_post_title = ! empty( $instance['webblog_blog_post_title'] ) ? $instance['webblog_blog_post_title'] : '';
		$webblog_blog_post_count = ! empty( $instance['webblog_blog_post_count'] ) ? $instance['webblog_blog_post_count'] : '';
		$webblog_blog_post_cat = ! empty( $instance[ 'webblog_blog_post_cat' ] ) ? $instance[ 'webblog_blog_post_cat' ] : '';
		 
		 ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'webblog_blog_post_title' ) ); ?>"><?php esc_attr_e( 'Post Title:', 'webblog' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'webblog_blog_post_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'webblog_blog_post_title' ) ); ?>" type="text" value="<?php echo esc_attr( $webblog_blog_post_title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'webblog_blog_post_cat' ) ); ?>"><?php esc_attr_e( 'Post Category:', 'webblog' ); ?></label>
			<?php
				$post_cat = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 0,
					'id'	=> $this->get_field_id( 'webblog_blog_post_cat' ),
					'name'	=> $this->get_field_name( 'webblog_blog_post_cat' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $webblog_blog_post_cat ),
					'show_option_all'	=> esc_html__( 'Choose Category', 'webblog' )
				);
				wp_dropdown_categories( $post_cat );
			?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'webblog_blog_post_count' ) )?>"><?php esc_attr_e( 'Number Of Post: ', 'webblog' )?></label>
			<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'webblog_blog_post_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'webblog_blog_post_count' ) ); ?>" value="<?php echo esc_attr( $webblog_blog_post_count ); ?>" min="1" max="4" class="widefat">
		</p>
		
		<?php 
	    }
		
		/**
	     * Processing widget options on save
	     *
	     * @param array $new_instance The new options
	     * @param array $old_instance The previous options
	     *
	     * @return array
	     */
		public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	    	$instance = array();
			$instance['webblog_blog_post_title'] = ( ! empty( $new_instance['webblog_blog_post_title'] ) ) ? sanitize_text_field( $new_instance['webblog_blog_post_title'] ) : '';
			$instance['webblog_blog_post_count'] = ( ! empty( $new_instance['webblog_blog_post_count'] ) ) ? absint( $new_instance['webblog_blog_post_count'] ) : '';
			$instance[ 'webblog_blog_post_cat' ] = absint( $new_instance[ 'webblog_blog_post_cat' ] );
			
			return $instance;
		}
		
		 /**
	      * Outputs the content of the widget
	      *
	      * @param array $args
	      * @param array $instance
	      */
		 public function widget( $args, $instance ) {
		
		 echo wp_kses_post( $args['before_widget'] );
		 
		 $webblog_blog_post_title = ! empty( $instance['webblog_blog_post_title'] ) ? $instance['webblog_blog_post_title'] : '';
		 $webblog_blog_post_count = ! empty( $instance['webblog_blog_post_count'] ) ? $instance['webblog_blog_post_count'] : '';
		 $webblog_blog_post_cat = ! empty( $instance[ 'webblog_blog_post_cat' ] ) ? $instance[ 'webblog_blog_post_cat' ] : '';
		
		 if ( ! empty( $instance['webblog_blog_post_title'] ) ) {
				$widget_title = apply_filters( 'widget_title', $instance['webblog_blog_post_title'] );
				echo wp_kses_post( $args['before_title'] . $widget_title . $args['after_title'] );

		 }
		
		?>
		<ul class="wb-post-wrap">
		<?php 
		
			$filter_param = array(
				'post_type' => 'post',
				'posts_per_page'        => absint($webblog_blog_post_count),
				'ignore_sticky_posts'   => true,
				'post_status'		   => 'publish',
				'cat'					=> absint($webblog_blog_post_cat)
			);
			
			$post_query = new WP_Query( $filter_param );
			
			if( $post_query->have_posts() ):
				
				while( $post_query->have_posts() ): $post_query->the_post(); ?>
					
					<li class="post-item">
						<div class="item-wrap">
							<?php if ( has_post_thumbnail() ) : ?>
							<figure class="item-thumb">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'webblog-post-thumb-widget' ); ?></a>
							</figure>
							<?php endif; ?>
							<div class="item-content">
								<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
								<span class="entry-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_date(); ?></span>
								<?php 
                  					 $num_comments = get_comments_number();
									 if ( $num_comments == 0 ) {
										$comments = __( 'No Comments', 'webblog' );
									 } elseif ( $num_comments > 1 ) {
										$comments = $num_comments . __( ' Comments', 'webblog' );
									 } else {
										$comments = __('1 Comment', 'webblog' );
									 }
           						?>
								<span class="entry-comment"><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo esc_html( $comments );?></span>
							</div>
						</div>
					</li>
				<?php endwhile; 
				
				wp_reset_postdata();
			
			endif;
		?>
		
		</ul>
		
		<?php
		 
		echo wp_kses_post( $args['after_widget'] );
		
		}
		
	} // end class - Webblog_Recent_Post_Widget
	
endif;