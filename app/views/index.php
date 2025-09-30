<div class="column is-half" id="column-window-about">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">About Me</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-about', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-about', 'window-maximized');"></button>
				<button aria-label="Close"></button>
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

@if (env('APP_ENABLE_BLOG'))
<div class="column is-half" id="column-window-blog">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Latest Blog Posts</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-blog', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-blog', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
			<a name="blog-list"></a>
			
			<div class="sunken-panel sunken-panel-blog ">
				<table class="interactive">
					<thead>
						<tr>
							<th class="is-stretched">Title</th>
							<th>Published</th>
						</tr>
					</thead>
					<tbody id="blog-posts" data-limit="5"></tobdy>
				</table>
			</div>

			<p><a class="btn btn-fixed-padding" href="{{ url('/blog') }}">View more</a></p>
		</div>
	</div>
</div>
@endif

<div class="column is-half"  id="column-window-projects">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Projects</div>
			<div class="title-bar-controls">
			<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-projects', 'window-minimized');"></button>
			<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-projects', 'window-maximized');"></button>
			<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="is-centered">
				<p>Check out the project showcase to see my most notable projects.</p>

				<div class="projects">
				@foreach ($sneakpeek as $project)
					<div class="project" style="background-image: url('{{ asset('img/projects/' . $project->get('preview')) }}');" onmouseover="this.children[0].style.display = 'block';" onmouseout="this.children[0].style.display = 'none';">
						<div class="project-overlay">
							<div class="project-info">
								<div class="project-info-title">{{ $project->get('title') }}</div>
								<div class="project-info-tagline">{{ $project->get('tagline') }}</div>
							</div>
						</div>
					</div>
				@endforeach
				</div>

				<a class="btn btn-highlight is-half is-pointer" href="{{ url('/projects') }}"><i class="fas fa-star color-yellow"></i>&nbsp;Project Showcase</a>
			</div>
		</div>
	</div>
</div>

<div class="column is-half" id="column-window-technologies">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Technologies</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-technologies', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-technologies', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="is-centered">
				<p>I have profound practical experience using the following technologies</p>

				<fieldset>
					<legend>Languages</legend>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-1" onclick="return false;" checked>
						<label for="field-row-lang-1">PHP</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-2" onclick="return false;" checked>
						<label for="field-row-lang-2">C++</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-3" onclick="return false;" checked>
						<label for="field-row-lang-3">MySQL</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-4" onclick="return false;" checked>
						<label for="field-row-lang-4">JavaScript</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-5" onclick="return false;" checked>
						<label for="field-row-lang-5">AngelScript</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-6" onclick="return false;" checked>
						<label for="field-row-lang-6">dnyScript</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-7" onclick="return false;" checked>
						<label for="field-row-lang-7">Java (Android)</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-8" onclick="return false;" checked>
						<label for="field-row-lang-8">CSS</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-9" onclick="return false;" checked>
						<label for="field-row-lang-9">HTML</label>
					</div>
				</fieldset>

				<fieldset>
					<legend>Frameworks</legend>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-1" onclick="return false;" checked>
						<label for="field-row-fw-1">Laravel</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-1" onclick="return false;" checked>
						<label for="field-row-fw-1">AsatruPHP</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-2" onclick="return false;" checked>
						<label for="field-row-fw-2">PHPUnit</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-3" onclick="return false;" checked>
						<label for="field-row-fw-3">Vue</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-4" onclick="return false;" checked>
						<label for="field-row-fw-4">MetroUI</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-5" onclick="return false;" checked>
						<label for="field-row-fw-5">Steamworks</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-6" onclick="return false;" checked>
						<label for="field-row-fw-6">DirectX</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-7" onclick="return false;" checked>
						<label for="field-row-fw-7">Bulma</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-8" onclick="return false;" checked>
						<label for="field-row-fw-8">phaser</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-9" onclick="return false;" checked>
						<label for="field-row-fw-9">Electron</label>
					</div>
				</fieldset>

				<fieldset>
					<legend>Tools</legend>
					<div class="field-row">
						<input type="checkbox" id="field-row-tool-1" onclick="return false;" checked>
						<label for="field-row-tool-1">Git</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-tool-2" onclick="return false;" checked>
						<label for="field-row-tool-2">Composer</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-tool-3" onclick="return false;" checked>
						<label for="field-row-tool-3">Xdebug</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-tool-4" onclick="return false;" checked>
						<label for="field-row-tool-4">npm</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-tool-4" onclick="return false;" checked>
						<label for="field-row-tool-4">nodejs</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-tool-5" onclick="return false;" checked>
						<label for="field-row-tool-5">Docker</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-tool-6" onclick="return false;" checked>
						<label for="field-row-tool-6">AquaShell</label>
					</div>
				</fieldset>

				<fieldset>
					<legend>IDE</legend>
					<div class="field-row">
						<input type="checkbox" id="field-row-ide-1" onclick="return false;" checked>
						<label for="field-row-lang-1">VS Code</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-2" onclick="return false;" checked>
						<label for="field-row-ide-2">Visual Studio Community</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-ide-3" onclick="return false;" checked>
						<label for="field-row-ide-3">PhpStorm</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-ide-4" onclick="return false;" checked>
						<label for="field-row-ide-4">Android Studio</label>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
</div>

<div class="column is-half" id="column-window-contact">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Contact</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-contact', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-contact', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="is-centered">
				<p>For job and project negotiations, please contact me via the button below.</p>

				<a class="btn is-half is-pointer" href="mailto:{{ env('APP_CONTACT') }}"><i class="fas fa-envelope"></i>&nbsp;Contact</a>
			</div>
		</div>
	</div>
</div>

<div class="column is-half" id="column-window-socials">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Socials</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-socials', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-socials', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="is-centered">
				@foreach (config('socials') as $social)
					@if ((is_string($social->url)) && (strlen($social->url) > 0))
						<a class="btn btn-social color-{{ $social->class }}" href="{{ $social->url }}" target="_blank"><i class="fab fa-{{ $social->class }} fa-lg"></i>&nbsp;{{ $social->name }}</a>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>

@if (env('APP_ENABLE_SHOUTBOX'))
<div class="column is-half" id="column-window-shoutbox">
	<div class="window">
		<div class="title-bar">
			<div class="title-bar-text">Shoutbox</div>
			<div class="title-bar-controls">
				<button aria-label="Minimize" onclick="window.toggleWindowSize('#column-window-shoutbox', 'window-minimized');"></button>
				<button aria-label="Maximize" onclick="window.toggleWindowSize('#column-window-shoutbox', 'window-maximized');"></button>
				<button aria-label="Close"></button>
			</div>
		</div>
		<div class="window-body">
			<div class="sunken-panel sunken-panel-shoutbox">
				<table class="interactive">
					<thead>
						<tr>
							<th>Username</th>
							<th class="is-stretched">Message</th>
						</tr>
					</thead>
					<tbody id="shoutbox-messages">
						@foreach ($shouts as $shout)
							<tr>
								<td>{{ $shout->get('username') }}</td>
								<td>{{ $shout->get('message') }}</td>
							</tr>
						@endforeach
					</tobdy>
				</table>
			</div>

			<p><a class="btn btn-fixed-padding" href="javascript:void(0);" onclick="clearInterval(window.shoutboxInterval); this.parentNode.remove();">Stop updates</a></p>
		</div>
	</div>
</div>
@endif

@include('footer.php')