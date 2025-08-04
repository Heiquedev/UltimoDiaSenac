/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.loginhash.dao;

import com.mycompany.loginhash.database.ConnectionSQL;
import com.mycompany.loginhash.model.Usuario;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import org.mindrot.jbcrypt.BCrypt;

/**
 *
 * @author Aluno
 */
public class UsuarioDAO {
    
    public boolean registrarUsuario(Usuario usuario) {
    String sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
    String senhaHash = BCrypt.hashpw(usuario.getSenha(), BCrypt.gensalt());

    try (Connection conn = ConnectionSQL.conectar(); 
         PreparedStatement stmt = conn.prepareStatement(sql)) {
        
        stmt.setString(1, usuario.getEmail());
        stmt.setString(2, senhaHash);
        stmt.executeUpdate();
        return true;
    } catch (SQLException e) {
        e.printStackTrace();
        return false;
    }
}
    
    public boolean validarLogin(Usuario usuario) {
    String sql = "SELECT senha FROM usuarios WHERE usuario = ?";

    try (Connection conn = ConnectionSQL .conectar(); 
         PreparedStatement stmt = conn.prepareStatement(sql)) {
        
        stmt.setString(1, usuario.getEmail());
        ResultSet rs = stmt.executeQuery();
        
        if (rs.next()) {
            String senhaHash = rs.getString("senha"); 
            boolean login = BCrypt.checkpw(usuario.getSenha(), senhaHash);
            
            if(login) {
                System.out.println("Logado com sucesso!");
                return login;
            } else {
                System.out.println("Erro ao logar.");
            }
        }
    } catch (SQLException e) {
        e.printStackTrace();
    }
    return false;
}
    
    public Usuario buscarUsuarioPorEmail(String email) {
        String sql = "SELECT * FROM usuarios WHERE usuario = ?";

        try (Connection conn = ConnectionSQL.conectar();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, email);
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                Usuario usuario = new Usuario(rs.getString("usuario"), rs.getString("senha"));
                System.out.println("Email: " + usuario.getEmail() + "\nSenha: " + BCrypt.hashpw(usuario.getSenha(), BCrypt.gensalt()));
                return usuario;
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        
        System.out.println("Usuário não encontrado!");
        return null;
}



}
