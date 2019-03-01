<ul class="list-inline m-0 p-0">
					<li class="list-inline-item px-2">
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
							<i class="fab fa-facebook"></i><span class="sr-only"> Share</span>
						</a>
					</li>
					<li class="list-inline-item px-2">
						<a target="_blank" href="https://www.twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_the_permalink()); ?>">
							<i class="fab fa-twitter"></i><span class="sr-only"> Tweet</span>
						</a>
					</li>
				</ul>