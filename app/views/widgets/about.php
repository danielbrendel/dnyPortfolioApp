<div class="column is-half is-hidden" id="column-window-about">
	<div class="window" onclick="window.setWidgetToTop('#column-window-about');">
		<div class="title-bar">
			<div class="title-bar-text">About Me</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-about', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-about', 'window-maximized');"></button>
				<button aria-label="Close" onclick="window.closeWidget('#column-window-about');"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="window-content-frame window-content-frame-image">
				<img src="img/logo.png" width="64" height="64" alt="logo"/>
			</div>
			
			<div class="window-content-frame window-content-frame-text">
				<p>Hey there! I'm <strong>Daniel Brendel</strong>, a senior indie software developer and project founder!</p>

				<p>
					I love creating complex software products across a range of fields, including web development, game development, and application development. 
					While I work with many programming languages, PHP and C++ are my main ones. 
					Over the years, I've founded various projects and am excited to create more. 
					I have strong expertise in designing and building complex software ecosystems. 
					I'm also an open-source advocate and passionate about promoting the values of Free and Open-Source Software.
				</p>

				<p> If you want to discuss a potential project or job, please feel free to contact me via the button below.</p>
				
				<p>
					Outside of my profession, I enjoy sports (mostly weightlifting and cardio), playing video games, attending nerd-culture conventions, 
					listening to music and savoring a good coffee. I like to read about various scientific topics and I'm also interested
					in various philosophical debates.
				</p>

				<p>
					Furthermore, having been diagnosed with NPD, I advocate for mental health awareness.
				</p>

				@if ((env('APP_GITHUB_SPONSOR')) || (env('APP_DONATION_KOFI')))
				<div class="has-spacing">
					@if (env('APP_GITHUB_SPONSOR'))
					<div class="is-inline-block">
						<a class="button button-blue button-icon-red" href="{{ env('APP_GITHUB_SPONSOR') }}"><i class="far fa-heart"></i>&nbsp;GitHub Sponsoring</a>
					</div>
					@endif

					@if (env('APP_DONATION_KOFI'))
					<div class="is-inline-block">
						<a class="button button-caramel button-icon-dark" href="{{ env('APP_DONATION_KOFI') }}"><i class="fas fa-coffee"></i>&nbsp;Buy Me a Coffee</a>
					</div>
					@endif
				</div>
				@endif
			</div>
		</div>
	</div>
</div>