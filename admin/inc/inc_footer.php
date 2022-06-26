</main>

	<footer class="bg-light">
		<div class="text-center p-3" style="background: #cccccc;">
			Copyright @copy; 2022
		</div>
	</footer>
	<!-- Editor WYSIWYG menggunakan summernote -->
	<script>
		$(document).ready(function() {
			$('.summernote').summernote({
				callbacks: {	//ketika di callback akan memasukan data-data (spt gambar/video)
		            onImageUpload: function(files) {
		                for(let i=0; i < files.length; i++) {
		                    $.upload(files[i]);
		                }
		            }
		    	},
				height: 200, 
				toolbar: [			//untuk list gambar
					["style", ["bold", "italic", "underline", "clear"]],
					["fontname", ["fontname"]],
					["fontsize", ["fontsize"]],
					["color", ["color"]],
					["para", ["ul", "ol", "paragraph"]],
					["height", ["height"]],
					["insert", ["link", "picture", "imageList", "video", "hr"]],
					["help", ["help"]]
				],
				dialogsInBody: true,
				imageList: {
					endpoint: "daftar_gambar.php",		//untuk menampilkan data
					fullUrlPrefix: "../gambar/",
					thumbUrlPrefix: "../gambar/"
				}
			});
			$.upload = function (file) {	//untuk upload gambar/video
		        let out = new FormData();
		        out.append('file', file, file.name);

		        $.ajax({
		            method: 'POST',
		            url: 'upload_gambar.php',  
		            contentType: false,
		            cache: false,
		            processData: false,
		            data: out,
		            success: function (img) {
		                $('#summernote').summernote('insertImage', img);
		            },
		            error: function (jqXHR, textStatus, errorThrown) {
		                console.error(textStatus + " " + errorThrown);
		            }
		        });
			};
		});
	</script>

</body>
</html>