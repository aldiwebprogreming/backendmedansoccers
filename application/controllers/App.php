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



		}
	?>