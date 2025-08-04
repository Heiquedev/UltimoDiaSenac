/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.loginhash;

import com.mycompany.loginhash.dao.UsuarioDAO;
import com.mycompany.loginhash.database.ConnectionSQL;
import com.mycompany.loginhash.model.Usuario;

/**
 *
 * @author Aluno
 */
public class LoginHash {

    public static void main(String[] args) {
            
        ConnectionSQL.conectar();
        
        Usuario meuUser = new Usuario("email@mail.com", "12345");
        UsuarioDAO usuarioDao = new UsuarioDAO();
        
//        usuarioDao.registrarUsuario(meuUser);
//        usuarioDao.validarLogin(meuUser);
        
        Usuario usuarioSelecionado = usuarioDao.buscarUsuarioPorEmail("email@mail.com");
        
        }
}
