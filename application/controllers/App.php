<?php 

		/**
		 * 
		 */
		class App extends CI_Controller
		{
			
			function __construct()
			{
				parent::__construct();
			}

			function wisata(){
				$this->load->view('app/wistat');
			}

			function index(){

				$this->load->view('template/header');
				$this->load->view('app/index');
				$this->load->view('template/footer');
			}

			function data_pengguna(){

				$data['pengguna'] = $this->db->get('tbl_profil')->result_array();

				$this->load->view('template/header');
				$this->load->view('app/data_pengguna', $data);
				$this->load->view('template/footer');
			}


			function hapus_pengguna(){

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_profil');
				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil dihapus", "success" );');
				redirect('app/data_pengguna');
			}

			function data_wasit(){

				$data['wasit'] = $this->db->get('tbl_wasit')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/data_wasit', $data);
				$this->load->view('template/footer');
			}

			function add_wasit(){

				$data  = [
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'jk' => $this->input->post('jk'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'nik' => $this->input->post('nik'),
					'nohp' => $this->input->post('nohp'),
				];

				$this->db->insert('tbl_wasit', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil ditambah", "success" );');
				redirect('app/data_wasit');
			}

			function hapus_wasit(){

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_wasit');

				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil dihapus", "success" );');
				redirect('app/data_wasit');
			}

			function edit_wasit(){


				$data  = [
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'jk' => $this->input->post('jk'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'nik' => $this->input->post('nik'),
					'nohp' => $this->input->post('nohp'),
				];

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->update('tbl_wasit', $data);


				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil diubah", "success" );');
				redirect('app/data_wasit');
			}

			function data_lapangan(){


				$data['lapangan'] = $this->db->get('tbl_lapangan')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/data_lapangan', $data);
				$this->load->view('template/footer');
			}

			function edit_lapangan(){

				$id = $this->input->post('id');
				$data = [
					'lapangan' => $this->input->post('lapangan'),
					'pasilitas' => $this->input->post('fasilitas'),
					'harga_perjam' => $this->input->post('harga_perjam'),
					'status_booking' => $this->input->post('status_booking'),
					'gambar' => $this->input->post('gambar'),
				];	

				$this->db->where('id', $id);
				$this->db->update('tbl_lapangan', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil diubah", "success" );');
				redirect('app/data_lapangan');
			}


			function data_goal(){
				$data['goal'] = $this->db->get_where('tbl_goal')->result_array();
				$data['pemain'] = $this->db->get_where('tbl_user')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/data_goal', $data);
				$this->load->view('template/footer');
			}


			function add_goal(){
				$nama = $this->input->post('nama');
				$user = $this->db->get_where('tbl_user', ['nama' => $nama])->row_array();

				$data = [
					'nama' => $this->input->post('nama'),
					'id_auth' => $user['id_auth'],
					'jml_goal' => $this->input->post('jml_goal'),
					'team' => $this->input->post('team'),
					'lawan' => $this->input->post('lawan'),
					'score_team' => $this->input->post('score_team'),
					'score_lawan' => $this->input->post('score_lawan'),
				];

				$this->db->insert('tbl_goal', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil ditambah", "success" );');
				redirect('app/data_goal');
			}

			function edit_goal(){


				$data = [
					'nama' => $this->input->post('nama'),
					'id_auth' => $user['id_auth'],
					'jml_goal' => $this->input->post('jml_goal'),
					'team' => $this->input->post('team'),
					'lawan' => $this->input->post('lawan'),
					'score_team' => $this->input->post('score_team'),
					'score_lawan' => $this->input->post('score_lawan'),
				];

				
				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->update('tbl_goal', $data);

				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil diubah", "success" );');
				redirect('app/data_goal');
			}


			function hapus_goal(){

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_goal');

				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil dihapus", "success" );');
				redirect('app/data_goal');
			}


			function data_asist(){

				$data['asist'] = $this->db->get_where('tbl_asist')->result_array();
				$data['pemain'] = $this->db->get_where('tbl_user')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/data_asist', $data);
				$this->load->view('template/footer');
			}

			function add_asist(){

				$nama = $this->input->post('nama');
				$user = $this->db->get_where('tbl_user', ['nama' => $nama])->row_array();

				$data = [
					'nama' => $this->input->post('nama'),
					'id_auth' => $user['id_auth'],
					'jml_asist' => $this->input->post('jml_asist'),
					'team' => $this->input->post('team'),
					'lawan' => $this->input->post('lawan'),
					// 'score_team' => $this->input->post('score_team'),
					// 'score_lawan' => $this->input->post('score_lawan'),
				];

				$this->db->insert('tbl_asist', $data);

				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil ditambah", "success" );');
				redirect('app/data_asist');
			}


			function edit_asist(){

				$data = [
					'nama' => $this->input->post('nama'),
					'id_auth' => $user['id_auth'],
					'jml_asist' => $this->input->post('jml_asist'),
					'team' => $this->input->post('team'),
					'lawan' => $this->input->post('lawan'),
					// 'score_team' => $this->input->post('score_team'),
					// 'score_lawan' => $this->input->post('score_lawan'),
				];

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->update('tbl_asist', $data);

				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil diubah", "success" );');
				redirect('app/data_asist');
			}

			function hapus_asist(){

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_asist');

				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil dihapus", "success" );');
				redirect('app/data_asist');
			}

			function data_mainhariini(){

				$data['main'] = $this->db->get_where('tbl_main', ['tgl_main' => date('Y-m-d')])->result_array();
				$data['team'] = $this->db->get_where('tbl_lawan', ['status' => 1])->result_array();
				$this->load->view('template/header');
				$this->load->view('app/data_mainhariini', $data);
				$this->load->view('template/footer');
			}

			function add_goal2(){

				$iduser = $this->input->post('id');
				$goal = $this->input->post('goal');

				$user = $this->db->get_where('tbl_user', ['id_auth' => $iduser])->row_array();
				$cektotal = $this->db->get_where('tbl_total_goal', ['id_user' => $iduser])->row_array();

				if ($cektotal) {


					$data = [
						'total' => $cektotal['total'] + 1
					];	
					
					$this->db->where('id_user', $iduser);
					$this->db->update('tbl_total_goal', $data);
				}else{

					$data = [

						'id_user' => $iduser,
						'nama' => $user['nama'],
						'total' => 1, 
					];

					$this->db->insert('tbl_total_goal', $data);
				}



				$data = [
					'nama' => $user['nama'],
					'id_auth' => $user['id_auth'],
					'jml_goal' => $this->input->post('goal'),
					'team' => $this->input->post('team'),
					'lawan' => $this->input->post('lawan'),
					// 'score_team' => $this->input->post('score_team'),
					// 'score_lawan' => $this->input->post('score_lawan'),
				];

				$this->db->insert('tbl_goal', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil ditambah", "success" );');
				redirect('app/data_mainhariini');
			}

			function add_asist2(){

				$iduser = $this->input->post('id');
				$asist = $this->input->post('asist');

				$user = $this->db->get_where('tbl_user', ['id_auth' => $iduser])->row_array();

				$data = [
					'nama' => $user['nama'],
					'id_auth' => $user['id_auth'],
					'jml_asist' => $this->input->post('asist'),
					'team' => $this->input->post('team'),
					'lawan' => $this->input->post('lawan'),
					// 'score_team' => $this->input->post('score_team'),
					// 'score_lawan' => $this->input->post('score_lawan'),
				];

				$this->db->insert('tbl_asist', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil ditambah", "success" );');
				redirect('app/data_mainhariini');
			}


			function data_lawan(){

				$data['lawan'] = $this->db->get('tbl_lawan')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/data_lawan', $data);
				$this->load->view('template/footer');
			}

			function set_lawan(){

				$this->db->update('tbl_lawan', ['status' => 0]);

				$data = [
					'status' => 1,
				];

				$this->db->where('jadwal', $this->input->post('jadwal'));
				$this->db->update('tbl_lawan', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Setting lawan berhasil", "success" );');
				redirect('app/data_lawan');
			}

		}
	?>