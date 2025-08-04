import React, { useRef } from 'react';
// Importa React e o hook useRef para criar uma referência que persiste entre renderizações

import { Animated, Pressable, Text, StyleSheet } from 'react-native';
// Importa Animated para animações, Pressable para detectar toques,
// Text para mostrar texto e StyleSheet para criar estilos

// Componente funcional que exibe um botão que "pulsar" quando clicado
export default function BotaoPulsante() {
  // Cria um valor animado chamado 'scale' para controlar a escala do botão (tamanho)
  // Começa com valor 1, que é o tamanho original
  const scale = useRef(new Animated.Value(1)).current;

  // Função que dispara a animação de pulsar no botão
  const animarBotao = () => {
    // Sequência de animações:
    // 1. Aumentar a escala para 1.2 (20% maior)
    // 2. Voltar para o tamanho original 1
    Animated.sequence([
      Animated.timing(scale, {
        toValue: 1.2,          // Escala para 1.2 (aumenta)
        duration: 100,         // Dura 100 milissegundos (0.1 segundo)
        useNativeDriver: true, // Usa driver nativo para melhor desempenho
      }),
      Animated.timing(scale, {
        toValue: 1,            // Volta para escala normal 1
        duration: 100,         // Também dura 100 ms
        useNativeDriver: true,
      }),
    ]).start();                // Inicia a sequência de animações
  };

  return (
    // Animated.View permite aplicar o valor animado 'scale' na transformação do botão
    <Animated.View style={{ transform: [{ scale }] }}>
      {/* Pressable detecta o toque do usuário para disparar a animação */}
      <Pressable onPress={animarBotao} style={styles.botao}>
        {/* Texto do botão */}
        <Text style={styles.textoBotao}>Clique aqui!</Text>
      </Pressable>
    </Animated.View>
  );
}

// Estilos do botão e do texto usando StyleSheet para melhor performance
const styles = StyleSheet.create({
  botao: {
    backgroundColor: '#388e3c',     // Cor de fundo verde escuro
    paddingHorizontal: 30,          // Espaçamento horizontal interno
    paddingVertical: 15,            // Espaçamento vertical interno
    borderRadius: 12,               // Bordas arredondadas
  },
  textoBotao: {
    color: '#fff',                  // Cor do texto branca
    fontSize: 18,                  // Tamanho da fonte
    fontWeight: 'bold',            // Texto em negrito
  },
});
