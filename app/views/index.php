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
				<p>Hey there! I am <strong>Daniel Brendel</strong>, an indie software developer and project founder!</p>

				<p>
					I love creating complex software products in various fields such as web development, game development and application development. 
					My main languages are PHP and C++ along with various other technologies. I founded various projects and still like to invent more projects.
					I am an OpenSource advocate and like to promote the idea of FOSS products.
				</p>

				<p> If you want to work together or want to offer a project/job, please feel free to contact me via the button below.</p>
				
				<p>When I am not developing software, I also like to do sports (mostly weight lifting and cardio), listening to music and enjoying a tasty Cappuccino.</p>

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
					<tbody id="blog-posts"></tobdy>
				</table>
			</div>
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
			<menu role="tablist" class="multirows">
				@for ($i = 0; $i < count($projects) / 2; $i++)
				<li role="tab" id="role-project-{{ $i + 1 }}" aria-selected="false"><a href="javascript:void(0);" onclick="window.switchProjectTab({{ $i + 1 }});">{{ $projects[$i]['name'] }}</a></li>
				@endfor
			</menu>
			<menu role="tablist" class="multirows">
				@for ($i = count($projects) / 2; $i < count($projects); $i++)
				<li role="tab" id="role-project-{{ $i + 1 }}" aria-selected="false"><a href="javascript:void(0);" onclick="window.switchProjectTab({{ $i + 1 }});">{{ $projects[$i]['name'] }}</a></li>
				@endfor
			</menu>
			<div class="window" role="tabpanel">
				<div class="window-body">
					@for ($i = 0; $i < count($projects); $i++)
					<div id="tab-project-{{ $i + 1 }}" class="is-hidden">
						<p>
							{{ $projects[$i]['description'] }}
						</p>

						<p>
							<?php $linkcnt = 0; ?>
							@foreach ($projects[$i]['links'] as $project_key => $project_link)
								<a href="{{ $project_link }}">{{ $project_key }}</a>

								@if ($linkcnt < count($projects[$i]['links']) - 1)
									&nbsp;|&nbsp;
								@endif

								<?php $linkcnt++; ?>
							@endforeach
						</p>
					</div>
					@endforeach
				</div>
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
				<p>I have profound practical experience in the following fields of technology</p>

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
						<label for="field-row-lang-6">Java (Android)</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-7" onclick="return false;" checked>
						<label for="field-row-lang-7">CSS</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-lang-8" onclick="return false;" checked>
						<label for="field-row-lang-8">HTML</label>
					</div>
				</fieldset>

				<fieldset>
					<legend>Frameworks</legend>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-1" onclick="return false;" checked>
						<label for="field-row-fw-1">Laravel</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-2" onclick="return false;" checked>
						<label for="field-row-fw-2">PHPUnit</label>
					</div>
					<div class="field-row">
						<input type="checkbox" id="field-row-fw-3" onclick="return false;" checked>
						<label for="field-row-fw-3">VueJS</label>
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
						<input type="checkbox" id="field-row-tool-5" onclick="return false;" checked>
						<label for="field-row-tool-5">Docker</label>
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
				<a class="btn btn-social color-github" href="{{ env('LINK_SOCIAL_GITHUB') }}" target="_blank"><i class="fab fa-github fa-lg"></i></a>
				<a class="btn btn-social color-steam" href="{{ env('LINK_SOCIAL_STEAM') }}" target="_blank"><i class="fab fa-steam fa-lg"></i></a>
				<a class="btn btn-social color-itchio" href="{{ env('LINK_SOCIAL_ITCHIO') }}" target="_blank"><i class="fab fa-itch-io fa-lg"></i></a>
				<a class="btn btn-social color-youtube" href="{{ env('LINK_SOCIAL_YOUTUBE') }}" target="_blank"><i class="fab fa-youtube fa-lg"></i></a>
				<a class="btn btn-social color-linkedin" href="{{ env('LINK_SOCIAL_LINKEDIN') }}" target="_blank"><i class="fab fa-linkedin fa-lg"></i></a>
				<a class="btn btn-social color-mastodon" href="{{ env('LINK_SOCIAL_MASTODON') }}" target="_blank"><i class="fab fa-mastodon fa-lg"></i></a>
			</div>
		</div>
	</div>
</div>

@include('footer.php')