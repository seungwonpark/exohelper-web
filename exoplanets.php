<script>
	d3.csv("database/exoplanet_list-selected-numbered.csv", function(error,data){
		var select = d3.select("body")
			.append("div")
			.append("select")
		select
			.on("change", function(d){
				var value = d3.select(this).property("value");
			});
		select.selectAll("option")
			.data(data)
			.enter()
				.append("option")
				.attr("value", function (d) {return d.value;})
				.text(function (d) {return d.label;});
	});
</script>