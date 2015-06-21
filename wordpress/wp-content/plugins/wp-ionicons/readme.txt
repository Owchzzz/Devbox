=== WP-IonIcons ===
Contributors: connectthink
Tags: icons, font, iconfont
Plugin URI: https://github.com/ConnectThink/wp-ionicons
Requires at least: 3.0.1
Tested up to: 3.8
Stable tag: 1.0
License: GPLv3 or later
License URI: http://www.gnu.org/copyleft/gpl.html

Quickly add ionicons to your theme. 

== Description ==

Easily add [ionicons](http://ionicons.com) support to your theme and wp-admin. Quickly add icons to your wordpress site via html, css or shortcode. Learn more, or get support on our [github page](https://github.com/ConnectThink/wp-ionicons).

= Usage =

**HTML**

Use icons in your posts and templates using the `<i>` element. First [find the icon](http://ionicons.com/) class name you wish to display and add the classes `icon` and the name of your icon of choice. Like so: 

>    `<i class="icon ion-chatbox"></i>`

**CSS**

Use icons in your css with `:before` and `:after` tags. Define the `content` property with with the [appropriate css content code](http://ionicons.com/) and define `font-family` as `Iconicons`. Like so:
    
   
>    `.element:before {
        content: '\f109';
        font-family: Ionicons;
        font-weight: normal;
        font-style: normal;
      }`

**SHORTCODE**

Use shortcodes in your post editor. Paste the icon class name in the name attribute.

>    `[icon name=ion-checkmark]`

= Credits =

Designed by [@helloimben](https://twitter.com/helloimben).

All brand icons are trademarks of their respective owners. The use of these trademarks does not indicate endorsement of the trademark holder by Drify, Connect Think, nor vice versa.

Plugin built and maintained by [Connect Think]('http://connectthink.com').


== Installation ==

You know the drill. 

1. Upload ionicons plugin via the Plugins page in Wordpress
2. Activate the plugin
3. Use one of the aformentioned methods to display your icons. 



== Frequently Asked Questions ==

= How do I edit or style icons? = 

Like regular fonts, these icons are vectors, so they are fully scalable to any size. Consider using css to make icons the precise size you need. You can also change the icon's color, orientation, or whatever you can think of. 

>    `.ion-checkmark {
        font-size: 30px;
        color: orange;
      }`

= Where can I find a list of the icons available? =

The icons come with a `Cheet Sheet` which can be accesses via the Plugins page in Wordpress. It will list all the plugins, their class name, css content value, and provide an example of different sizes. 

You can also visit [ionicons.com](http://ionicons.com/) for a searchable list of all the icons. Yay! No scrolling line by line!

= I need help or would like to make a suggestion =

Great, create an issue on our [github page](https://github.com/ConnectThink/wp-ionicons), we'll help however we can.  
