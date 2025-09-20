const sidebar = document.querySelector('#menu_sidebar')
const menu_user = document.querySelector('#menu_user')
const btn_user = document.querySelector('#user_btn')
const btn_kembali_user = document.querySelector('#kembali_user')
const btn_humberger = document.querySelector('#humberger')
const navbar = document.querySelector('#navbar')
const user_profil = document.querySelector('#user_profil')
const user_profil_child = document.querySelector('#user_profil_child')
const btn_user_profil = document.querySelector('#btn_user_profil')

// ##########    Tombol Sidebar User     ##########
btn_user.addEventListener('click', function () {
  sidebar.classList.add('transform')
  setTimeout(function () {
    sidebar.classList.add('hidden')
    menu_user.classList.remove('hidden')
    setTimeout(() => {
      menu_user.classList.remove('transform')
    }, 50);
  }, 150)
})

// ##########    Tombol Sidebar User Kembali     ##########
btn_kembali_user.addEventListener('click', function () {
  menu_user.classList.add('transform')
  setTimeout(function () {
    sidebar.classList.remove('hidden')
    menu_user.classList.add('hidden')
    setTimeout(() => {
      sidebar.classList.remove('transform')
    }, 50);
  }, 150)
})

// ##########    Tombol Sidebar     ##########
btn_humberger.addEventListener('click', function () {
  navbar.classList.toggle('transform')
})

// ##########    Tombol Modal Profil User Close     ##########
function CloseUserProfil() {
  user_profil.classList.add('bg-opacity-0')
  user_profil.classList.remove('bg-opacity-40')
  user_profil_child.classList.add('transform')
  setTimeout(() => {
    user_profil.classList.add('hidden')
    user_profil.classList.remove('flex')
    document.body.classList.remove('overflow-hidden')
  }, 200);
}
user_profil.addEventListener('click', function (e) {
  if (e.target == user_profil) {
    user_profil.classList.add('bg-opacity-0')
    user_profil.classList.remove('bg-opacity-40')
    user_profil_child.classList.add('transform')
    setTimeout(() => {
      user_profil.classList.add('hidden')
      user_profil.classList.remove('flex')
      document.body.classList.remove('overflow-hidden')
    }, 200);
  }
})

// ##########    Tombol Modal Profil User     ##########
btn_user_profil.addEventListener('click', function () {
  user_profil.classList.remove('hidden')
  user_profil.classList.add('flex')
  document.body.classList.add('overflow-hidden')
  setTimeout(() => {
    user_profil_child.classList.remove('transform')
    user_profil.classList.remove('bg-opacity-0')
    user_profil.classList.add('bg-opacity-40')
  }, 50);
})