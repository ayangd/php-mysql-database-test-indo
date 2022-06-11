<!DOCTYPE html>
<html>
	<head>
		<title>Assigment SQL</title>
		<style>
			.selectableTable tbody tr:hover {
				background-color: #6c757d;
				color: white;
				cursor: pointer;
			}
			.selectableTable tbody tr {
				transition: 0.1s;
			}
			.marginated {
				margin: 2em;
			}
			.padded {
				padding: 15;
			}
			.flexCenter {
				display: flex;
				justify-content: center;
			}
		</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<div class="container" style="margin: 0; max-width: 100vw;">
			<div class="row">
				<div class="col-3" style="background-color: #f0f0f0; padding-top: 15px; padding-bottom: 15px; min-height: 100vh; text-align: center;">
					<ul class="nav nav-tabs nav-fill" id="formTabNav" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="add-tab" data-toggle="tab" href="#addForm" aria-controls="addForm" aria-selected="true">Tambah Barang</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="edit-tab" data-toggle="tab" href="#editForm" aria-controls="editForm" aria-selected="false">Ubah Barang</a>
						</li>
					</ul>
					<div class="tab-content" id="formTabContent">
						<div class="tab-pane fade show active" id="addForm" role="tabpanel" aria-labelledby="add-tab">
							<br>
							<div id="addAlert"></div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="anamelabel">Nama Barang</span>
								</div>
								<input type="text" class="form-control" placeholder="Nama Barang" aria-label="Nama Barang" aria-describedby="anamelabel" id="aname">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="acatlabel">Kategori</span>
								</div>
								<input type="text" class="form-control" placeholder="Kategori" aria-label="Kategori" aria-describedby="acatlabel" id="acat" data-toggle="tooltip" data-placement="right" title="Pilihlah kategori di Daftar Kategori" disabled>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="aunitlabel">Satuan</span>
								</div>
								<input type="text" class="form-control" placeholder="Satuan" aria-label="Satuan" aria-describedby="aunitlabel" id="aunit">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="aamountlabel">Jumlah</span>
								</div>
								<input type="text" class="form-control" placeholder="Jumlah" aria-label="Jumlah" aria-describedby="aamountlabel" id="aamount">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="apricelabel">Harga</span>
								</div>
								<input type="numeric" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="apricelabel" id="aprice">
							</div>
							<button type="button" class="btn btn-success btn-block" onclick="addToTable();"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg> Tambah</svg></button>
						</div>
						<div class="tab-pane fade" id="editForm" role="tabpanel" aria-labelledby="edit-tab">
							<br>
							<div id="editAlert"></div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="lcodelabel">Kode Barang</span>
								</div>
								<input type="text" class="form-control" placeholder="Kode Barang" aria-label="Kode Barang" aria-describedby="lcodelabel" id="lcode" data-toggle="tooltip" data-placement="right" title="Pilihlah tabel untuk mengubah." disabled>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="lnamelabel">Nama Barang</span>
								</div>
								<input type="text" class="form-control" placeholder="Nama Barang" aria-label="Nama Barang" aria-describedby="lnamelabel" id="lname">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="lcatlabel">Kategori</span>
								</div>
								<input type="text" class="form-control" placeholder="Kategori" aria-label="Kategori" aria-describedby="lcatlabel" id="lcat" data-toggle="tooltip" data-placement="right" title="Pilihlah kategori di Daftar Kategori." disabled>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="lunitlabel">Satuan</span>
								</div>
								<input type="text" class="form-control" placeholder="Satuan" aria-label="Satuan" aria-describedby="lunitlabel" id="lunit">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="lamountlabel">Jumlah</span>
								</div>
								<input type="text" class="form-control" placeholder="Jumlah" aria-label="Jumlah" aria-describedby="lamountlabel" id="lamount">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="lpricelabel">Harga</span>
								</div>
								<input type="numeric" class="form-control" placeholder="Harga" aria-label="Harga" aria-describedby="lpricelabel" id="lprice">
							</div>
							<button type="button" class="btn btn-warning btn-block" onclick="alterTable();"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg> Ubah</button>
							<button type="button" class="btn btn-danger btn-block" onclick="deleteTable();"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg> Hapus</button>
						</div>
					</div>
					<hr>
					<button type="button" class="btn btn-primary btn-block" onclick="refreshTableContent();"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/><path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/></svg> Segarkan</button>
				</div>
				<div class="col-2" style="background-color: #f7f7f7; padding-top: 15px; padding-bottom: 15px; max-height: 100vh; text-align: center; overflow-y: auto;">
					<h5><strong>Daftar Kategori <a tabindex="0" data-toggle="tooltip" data-placement="bottom" title="Klik sekali untuk pilih. Klik dua kali untuk ubah. Teks akan bergetar ketika perubahan gagal. Ubah dan hapus teks untuk menghapus kategori."><svg width="1.1em" height="1.1em" viewBox="0 0 16 16" class="bi bi-question-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></a></strong></h5>
					<div id="categoryList">
						<hr>
						<div class="spinner-border spinner-growing text-primary" role="status">
							<span class="sr-only">Loading...</span>
						</div>
						<br><br>
					</div>
					<button type="button" class="btn btn-outline-primary" onclick="addCategory();"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></button>
				</div>
				<div class="col" style="overflow-y: auto; max-height: 100vh;">
					<br>
					<div id="tablePagination"></div>
					<div id="tableContent" class="d-flex justify-content-center">
						<div class="spinner-border spinner-growing text-primary" role="status" style="width: 3rem; height: 3rem;">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script>
			function createPagination(pageCount, selectedPage) {
				let nav = $("<nav aria-label=\"...\"></nav>");
				let ul = $("<ul class=\"pagination flexCenter\"></ul>");
				nav.append(ul);
				var prev = $("<li class=\"page-item disabled\"></li>");
				let preva = $("<a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">&laquo;</a>");
				prev.append(preva);
				ul.append(prev);
				let lis = [];
				let fli = $("<li class=\"page-item active\" aria-current=\"page\"></li>");
				let flia = $("<a class=\"page-link\" href=\"#\">1<span class=\"sr-only\">(current)</span></a>");
				fli.append(flia);
				ul.append(fli);
				lis.push(fli);
				//console.log(lis);
				var activePage = fli;
				for (let i = 2; i <= pageCount; i++) {
					let li = $("<li class=\"page-item\"></li>");
					let lia = $("<a class=\"page-link\" href=\"#\">" + i + "</a>");
					li.append(lia);
					ul.append(li);
					lis.push(li);
				}
				function changeActivePage(aelement) {
					if (aelement.children.length == 0) {
						// Select page
						refreshTableContent(parseInt(/\d+/.exec(aelement.innerHTML)));
						
						// Update pagination visual
						$(activePage.children()[0].children[0]).appendTo($(aelement));
						$(aelement).parent().attr("aria-current", "page");
						activePage.removeAttr("aria-current");
						activePage.removeClass("active");
						$(aelement).parent().addClass("active");
						activePage = $(aelement).parent();
						
						// Update Previous
						if (activePage.prev()[0] == prev[0]) {
							prev.addClass("disabled");
							prev.children().removeAttr("tabindex");
							prev.children().removeAttr("aria-disabled");
						} else {
							prev.removeClass("disabled");
							prev.children().attr("tabindex", "-1");
							prev.children().attr("aria-disabled", "true");
						}
						
						// Update Next
						if (activePage.next()[0] == next[0]) {
							next.addClass("disabled");
							next.children().removeAttr("tabindex");
							next.children().removeAttr("aria-disabled");
						} else {
							next.removeClass("disabled");
							next.children().attr("tabindex", "-1");
							next.children().attr("aria-disabled", "true");
						}
					}
				}
				for (let i = 0; i < lis.length; i++) {
					lis[i].children().on("click", function() {
						changeActivePage(this);
					});
				}
				var next = $("<li class=\"page-item\"></li>");
				let nexta = $("<a class=\"page-link\" href=\"#\">&raquo;</a>");
				next.append(nexta);
				ul.append(next);
				
				// Next and prev events
				preva.click(function() {
					if (!$(this).hasClass("disabled")) {
						changeActivePage(lis.find(o => o[0] == activePage.prev()[0]).children()[0]);
					}
				});
				nexta.click(function() {
					if (!$(this).hasClass("disabled")) {
						changeActivePage(lis.find(o => o[0] == activePage.next()[0]).children()[0]);
					}
				});
				
				if (selectedPage != undefined) {
					changeActivePage(lis[selectedPage - 1].children()[0]);
				}
				
				return nav;
			}
		
			var currentPage = <?php echo (isset($_GET["page"]) ? $_GET["page"] : 1); ?>;
			function refreshTableContent(page) {
				let req = "show.php";
				if (page != undefined) {
					req = "show.php?page=" + page;
					currentPage = page;
				} else {
					req = "show.php?page=" + currentPage;
				}
				$.get(req, function(data, status) {
					if (status == "success") {
						var obj = JSON.parse(data);
						if (obj.length == 0) {
							$("#tableContent").html("Table is empty.");
						} else {
							let cont = "";
							cont += "<br><table class=\"table selectableTable\" id=\"itemTable\">";
							cont += "<thead class=\"thead-light\"><tr>";
							cont += "<th scope=\"col\">Kode Barang</th>";
							cont += "<th scope=\"col\">Nama Barang</th>";
							cont += "<th scope=\"col\">Kategori</th>";
							cont += "<th scope=\"col\">Satuan</th>";
							cont += "<th scope=\"col\">Jumlah</th>";
							cont += "<th scope=\"col\">Harga</th>";
							cont += "</tr></thead>";
							cont += "<tbody>";
							obj.forEach(function(item, index) {
								cont += "<tr>";
								cont += "<th scope=\"row\">" + item.KodeBarang + "</th>";
								cont += "<td>" + item.NamaBarang + "</td>";
								cont += "<td>" + item.Kategori + "</td>";
								cont += "<td>" + item.Satuan + "</td>";
								cont += "<td>" + item.Jumlah + "</td>";
								cont += "<td>" + item.Harga + "</td>";
								cont += "</tr>";
							});
							cont += "</tbody></table>";
							$("#tableContent").html(cont);
							
							// add listeners
							$("#itemTable tbody tr").click(function() {
								$("#lcode").val(this.childNodes[0].innerHTML);
								$("#lname").val(this.childNodes[1].innerHTML);
								$("#lcat").val(this.childNodes[2].innerHTML);
								$("#lunit").val(this.childNodes[3].innerHTML);
								$("#lamount").val(this.childNodes[4].innerHTML);
								$("#lprice").val(this.childNodes[5].innerHTML);
								$("#edit-tab").tab("show");
							});
						}
					}
				});
			}
			
			function updateCategoryListeners() {
				$("#categoryTable tbody tr td:last-child").dblclick(function() {
					if ($(this).children().length == 0) {
						let text = $(this).html();
						$(this).html('');
						let inputControl = $('<input type="text" class="form-control">');
						inputControl.val(text);
						$(this).append(inputControl);
						inputControl.focus();
						
						var shake = function(self) {
							var a = $(self);
							a.css('display', 'inline-block');
							a.addClass('animate__animated');
							a.addClass('animate__faster');
							a.addClass('animate__shakeX');
							setTimeout(function() {
								a.removeClass('animate__animated');
								a.removeClass('animate__faster');
								a.removeClass('animate__shakeX');
							}, 800);
						}
						var updateFunc = function(self) {
							if ($(self).val() == '') {
								$.ajax({
									type: "POST",
									url: "deleteCat.php",
									data: {
										code: $(self).parent().prev().html()
									},
									statusCode: {
										200: function(data) {
											if ($("#addForm").hasClass("active")) {
												$("#acat").val('');
											} else {
												$("#lcat").val('');
											}
											refreshCategoryList();
											refreshTableContent();
										},
										400: function() {
											shake(self);
										},
										500: function() {
											shake(self);
										}
									}
								});
							} else {
								$.ajax({
									type: "POST",
									url: "alterCat.php",
									data: {
										code: $(self).parent().prev().html(),
										name: $(self).val()
									},
									statusCode: {
										200: function(data) {
											var td = $(self).parent();
											td.html($(self).val());
											td.click();
											refreshTableContent();
										},
										400: function() {
											shake(self);
										},
										500: function() {
											shake(self);
										}
									}
								});
							}
						}
						
						inputControl.focusout(function() {
							updateFunc(this);
						});
						inputControl.keydown(function (e) {
							if (e.which == 13) {
								updateFunc(this);
								return false;
							}
						});
					}
				});
				$("#categoryTable tbody tr td:last-child").click(function() {
					if ($(this).children().length == 0) {
						if ($("#addForm").hasClass("active")) {
							$("#acat").val($(this).html());
						} else {
							$("#lcat").val($(this).html());
						}
					}
				});
			}
			
			function refreshCategoryList() {
				$.get("categoryList.php", function(data, status) {
					if (status == "success") {
						var obj = JSON.parse(data);
						if (obj.length == 0) {
							$("#categoryList").html("<hr>Category List is empty.");
						} else {
							let cont = "";
							cont += '<table class="table table-sm selectableTable" id="categoryTable"><tbody>';
							obj.forEach(function(item, index) {
								cont += '<tr>';
								cont += '<td hidden>' + item['KodeKategori'] + '</td>';
								cont += '<td>' + item['NamaKategori'] + '</td>';
								cont += '</tr>';
							});
							cont += '</tbody></table>';
							$("#categoryList").html(cont);
							
							updateCategoryListeners();
						}
					}
				});
			}
			
			function newCreatePagination(selectedPage) {
				$.get("pagecount.php", function(data, status) {
					if (status == "success") {
						$("#tablePagination").empty();
						$("#tablePagination").append(createPagination(parseInt(data), selectedPage));
					}
				});
			}
			
			function addCategory() {
				var catInput = $('<input type="text" class="form-control">');
				var newCat = $('<tr><td></td></tr>');
				newCat.children('td').append(catInput);
				$("#categoryTable tbody").append(newCat);
				
				var shake = function(self) {
					var a = $(self);
					a.css('display', 'inline-block');
					a.addClass('animate__animated');
					a.addClass('animate__faster');
					a.addClass('animate__shakeX');
					setTimeout(function() {
						a.removeClass('animate__animated');
						a.removeClass('animate__faster');
						a.removeClass('animate__shakeX');
					}, 800);
				}
				var addFunc = function(self) {
					$.ajax({
						type: "POST",
						url: "addCat.php",
						data: {
							name: $(self).val()
						},
						statusCode: {
							200: function(data) {
								$(self).parent().html($(self).val());
								refreshCategoryList();
							},
							400: function() {
								shake(self);
							},
							500: function() {
								shake(self);
							}
						}
					});
				}
				
				// add listeners
				catInput.focusout(function() {
					if ($(this).val() == '') {
						$('#categoryTable tbody tr:last').remove();
					} else {
						addFunc(this);
					}
				});
				catInput.keydown(function (e) {
					if (e.which == 13) {
						if ($(this).val() == '') {
							$('#categoryTable tbody tr:last').remove();
						} else {
							addFunc(this);
						}
						return false;
					}
				});
				catInput.focus();
			}
			
			function addToTable() {
				if ($("#aname").val().length == 0) {
					showAlert("#addAlert", "warning", "Isilah nama barang!");
					return;
				}
				if ($("#acat").val().length == 0) {
					showAlert("#addAlert", "warning", "Isilah kategori!");
					return;
				}
				if ($("#aunit").val().length == 0) {
					showAlert("#addAlert", "warning", "Isilah satuan!");
					return;
				}
				if ($("#aamount").val().length == 0) {
					showAlert("#addAlert", "warning", "Isilah jumlah!");
					return;
				}
				if ($("#aprice").val().length == 0) {
					showAlert("#addAlert", "warning", "Isilah harga!");
					return;
				}
				if (!/^\d+$/.test($("#aamount").val())) {
					showAlert("#addAlert", "warning", "Isilah jumlah dengan angka!");
					return;
				}
				if (!/^\d+$/.test($("#aprice").val())) {
					showAlert("#addAlert", "warning", "Isilah harga dengan angka!");
					return;
				}
				let name = $("#aname").val();
				let cat = $("#acat").val();
				let unit = $("#aunit").val();
				let amount = $("#aamount").val();
				let price = $("#aprice").val();
				$.post("add.php", {name: name, cat: cat, unit: unit, amount: amount, price: price}, function(data, status) {
					if (status == "success") {
						newCreatePagination(currentPage);
						refreshTableContent();
					}
				});
			}
			
			function alterTable() {
				if ($("#lcode").val().length == 0) {
					showAlert("#editAlert", "warning", "Pilihlah baris yang mau diganti!");
					return;
				}
				if ($("#lname").val().length == 0) {
					showAlert("#editAlert", "warning", "Isilah nama barang!");
					return;
				}
				if ($("#lcat").val().length == 0) {
					showAlert("#editAlert", "warning", "Isilah kategori!");
					return;
				}
				if ($("#lunit").val().length == 0) {
					showAlert("#addAlert", "warning", "Isilah satuan!");
					return;
				}
				if ($("#lamount").val().length == 0) {
					showAlert("#addAlert", "warning", "Isilah jumlah!");
					return;
				}
				if ($("#lprice").val().length == 0) {
					showAlert("#addAlert", "warning", "Isilah harga!");
					return;
				}
				if (!/^\d+$/.test($("#lamount").val())) {
					showAlert("#addAlert", "warning", "Isilah jumlah dengan angka!");
					return;
				}
				if (!/^\d+$/.test($("#lprice").val())) {
					showAlert("#addAlert", "warning", "Isilah harga dengan angka!");
					return;
				}
				let code = $("#lcode").val();
				let name = $("#lname").val();
				let cat = $("#lcat").val();
				let unit = $("#lunit").val();
				let amount = $("#lamount").val();
				let price = $("#lprice").val();
				$.post("alter.php", {code: code, name: name, cat: cat, unit: unit, amount: amount, price: price}, function(data, status) {
					if (status == "success") {
						newCreatePagination(currentPage);
						refreshTableContent();
					}
				});
			}
			
			function deleteTable() {
				if ($("#lcode").val().length == 0) {
					showAlert("#editAlert", "warning", "Pilihlah baris yang mau dihapus!");
					return;
				}
				let code = $("#lcode").val();
				$.post("delete.php", {code: code}, function(data, status) {
					if (status == "success") {
						$("#lcode").val("");
						$("#lname").val("");
						$("#lcat").val("");
						$("#lunit").val("");
						$("#lamount").val("");
						$("#lprice").val("");
						newCreatePagination(currentPage);
						refreshTableContent();
					}
				});
			}
			
			function createAlert(type, message) {
				let div = $("<div class=\"alert alert-" + type + " alert-dismissible fade show\" role=\"alert\"></div>");
				div.html(message);
				let closeButton = $("<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"></button>");
				let iconSpan = $("<span aria-hidden=\"true\">&times;</span>");
				closeButton.append(iconSpan);
				div.append(closeButton);
				return div;
			}
			
			function showAlert(elementName, type, message) {
				$(elementName).empty();
				$(elementName).append(createAlert(type, message));
			}
			
			$("#formTabNav a").on("click", function(e) {
				e.preventDefault();
				$(this).tab('show');
			});
			$(function () {
				$('[data-toggle="tooltip"]').tooltip();
			})
			newCreatePagination(currentPage);
			refreshTableContent();
			refreshCategoryList();
		</script>
	</body>
</html>