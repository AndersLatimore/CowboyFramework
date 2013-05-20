<h1>Index Controller</h1>
<p>Welcome to Cowboy index controller.</p>

<h2>Download</h2>
<p>You can download Cowboy from github.</p>
<blockquote>
<code>git clone git://github.com/AndyAkesson/CowboyFramework.git</code>
</blockquote>
<p>You can review its source directly on github: <a href='https://github.com/AndyAkesson/CowboyFramework' target="blank" alt="cowboy on github">https://github.com/AndyAkesson/CowboyFramework</a></p>

<h2>Installation</h2>
<p>First you have to make the data-directory writable. This is the place where Cowboy needs
to be able to write and create files.</p>
<blockquote>
<code>cd cowboy_framework; chmod 777 site/data</code>
</blockquote>

<p>Second, Cowboy has some modules that need to be initialised. You can do this through a
controller. Point your browser to the following link.</p>
<blockquote>
<a href='<?=create_url('module/install')?>'>module/install</a>
</blockquote>

<p>By initializing the modules some default content is created in the database. You can go to 
<code>CMContent.php</code> where you will be able to see what is created.<p/>
