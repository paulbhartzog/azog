<hr size="1"/>
<h2>Azog</h2>
<pre>
<b>Dynamically-loaded components. on page request. working. also generates this list:</b>
Recognizers
<?php
	foreach($recognizers_array as $recognizer){
		echo "\t" . $recognizer . "\n";
	}
?>
Deliverers
<?php
	foreach($deliverers_array as $deliverer){
		echo "\t" . $deliverer . "\n";
	}
?>
<hr size="1"/>
<pre>
<h3>Endpoint - Request (Recognizers)</h3>
recognize
	system must come with one default recognizer or it will not be able to recognize any requests
	<?php $request = http_get(); ?>
	current request (as recognized by default HTTP recognizer) :: 
			<b><?php echo $request ?></b>

<h3>Middle(ware) - Mobilizers</h3>
lookup route
check availability
mapping request to response
	http_get() --> html(request)
possible routes
	CREATE -> add (sql INSERT)
	READ (Retrieve) -> view (sql SELECT)
	UPDATE -> edit (sql UPDATE)
	DELETE (Destroy) -> delete (sql DELETE)
<h3>Endpoint - Response - Deliverers</h3>
deliver
	use deliverer
		system must come with one default deliverer or it will not be able to deliverer any responses
		html response (as delivered by default HTML deliverer) :: 
			<b><?php echo htmlspecialchars(html('view', $request)); ?></b>
		json response (as delivered by default JSON deliverer) :: 
			<b><?php echo json($request); ?></b>
</pre>
<hr size="1"/>
<h2>To Consider</h2>
<ul>
	<li>Security</li>
	<li>Mobilizers</li>
	<li>Localization</li>
</ul>
<h2>Flow</h2>
<ol style="list-style: upper-roman outside">
	<li>Render
		<ol style="list-style: upper-alpha outside">
			<li>Lens</li>
			<li>Security check - all sites must have at least one publicly viewable page
				<ol style="list-style: upper-alpha outside">
					<li>authentication level (anon, auth, admin)</li>
					<ol style="list-style: lower-roman outside">
						<li>anon<li>
						<li>auth<li>
						<li>admin<li>
					</ol>
				</ol>
			</li>
		</ol>
	</li>
</ol>
