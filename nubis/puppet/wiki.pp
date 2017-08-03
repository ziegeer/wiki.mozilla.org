# Install mysql client libraries
include mysql::client

package { "php5-mysql":
  ensure => 'latest'
}

package { 'php5-xcache':
  ensure => 'latest'
}

package { 'graphviz':
  ensure => 'latest'
}

package { 'php5-memcache':
  ensure => 'latest'
}

package { 'php5-intl':
  ensure => 'latest'
}

package { 'php5-gd':
  ensure => 'latest'
}

package { 'pandoc':
  ensure => 'latest'
}

package { 'memcached':
  ensure => 'latest'
}

package { 'librsvg2-bin':
  ensure => 'latest'
}

package { 'imagemagick':
  ensure => 'latest'
}

package { 'git':
  ensure => 'latest'
}

# Generate some random secrets for mediawiki on boot
file { '/etc/nubis.d/wiki-secrets':
    ensure => file,
    owner  => root,
    group  => root,
    mode   => '0755',
    source => 'puppet:///nubis/files/wiki-onboot',
}

# Set up cache directory
file { '/var/tmp/wikimo-cache':
    ensure => directory,
    owner  => www-data,
    group  => www-data,
    mode   => '0750',
}

# Set permissions for Widgets
file { "/var/www/$project_name/extensions/Widgets/compiled_templates":
    ensure => directory,
    owner  => www-data,
    group  => www-data,
    mode   => '0750',
}

# Link files that aren't in the core repo to where they need to be
file { "/var/www/$project_name/core/LocalSettings.php":
    ensure => 'link',
    target => "/var/www/$project_name/LocalSettings.php",
}
file { "/var/www/$project_name/core/composer.local.json":
    ensure => 'link',
    target => "/var/www/$project_name/composer.local.json",
}
exec { 'mv_extensions':
    provider => 'shell',
    command => "mv extensions/* core/extensions/",
    cwd => "/var/www/$project_name",
}
exec { 'mv_skins':
    provider => 'shell',
    command => "mv skins/* core/skins/",
    cwd => "/var/www/$project_name",
}

# Links to EFS mount dirs
file { "/var/www/$project_name/images":
    ensure => 'link',
    target => "/data/$project_name",
}
file { "/var/www/$project_name/php_sessions":
    ensure => 'link',
    target => "/data/$project_name/php_sessions",
}
file { "/var/www/$project_name/extensions/Bugzilla/charts":
    ensure => 'link',
    target => "/data/$project_name/Bugzilla_charts",
}

## Install PHP composer extensions
#exec { 'composer':
#    provider => 'shell',
#    command => "/usr/bin/php ../tools/composer.phar install --no-dev && /usr/bin/php ../tools/composer.phar update --no-dev",
#    cwd => "/var/www/$project_name/core",
#    environment => [
#        'HOME=/tmp',
#    ],
#}

## Localization
#exec { 'localize':
#    command => "/usr/bin/php maintenance/rebuildLocalisationCache.php",
#    cwd => "/var/www/$project_name/core",
#}
