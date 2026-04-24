import { useEffect, useRef } from 'react';

const VERT = `
  attribute vec2 a_pos;
  varying vec2 v_uv;
  void main() {
    v_uv = vec2(a_pos.x * 0.5 + 0.5, -a_pos.y * 0.5 + 0.5);
    gl_Position = vec4(a_pos, 0.0, 1.0);
  }`;

const FRAG = `
  precision mediump float;
  uniform sampler2D u_tex;
  uniform float     u_time;
  varying vec2      v_uv;
  void main() {
    float skyLine = 0.60;
    float inSky = smoothstep(skyLine - 0.04, skyLine + 0.06, v_uv.y);
    vec2 skyCenter = vec2(0.5, 1.0);
    float creep = fract(u_time * 0.00050 / 0.05) * 0.05;
    float zoomFactor = 1.0 - (sin(u_time * 0.015) * 0.018 + creep) * inSky;
    vec2 zoomedSkyUV = skyCenter + (v_uv - skyCenter) * zoomFactor;
    vec2 skyUV = mix(v_uv, zoomedSkyUV, inSky);
    float cloudDx = inSky * (
        sin(u_time * 0.035 + v_uv.x * 1.2) * 0.007
      + sin(u_time * 0.055 + v_uv.x * 0.7) * 0.004
    );
    float cloudDy = (skyUV.y - v_uv.y);
    float inPlant = 1.0 - smoothstep(skyLine - 0.07, skyLine + 0.02, v_uv.y);
    float depth = clamp((skyLine - v_uv.y) / skyLine, 0.0, 1.0);
    float gust = sin(u_time * 0.30) * 0.45
               + sin(u_time * 0.50) * 0.30
               + sin(u_time * 0.80) * 0.25;
    float clusterPhase = v_uv.x * 6.0
                       + sin(v_uv.x * 3.0) * 1.8
                       + v_uv.y * 1.8;
    float clusterSway = sin(u_time * 0.90 + clusterPhase) * 0.60
                      + sin(u_time * 1.50 + clusterPhase * 0.75 + 1.6) * 0.40;
    float plantAmp = pow(depth, 0.55) * 0.0045 * inPlant;
    float plantDx = (gust * 0.55 + clusterSway * 0.45) * plantAmp;
    float plantDy = sin(u_time * 0.65 + clusterPhase + 2.8) * plantAmp * 0.12;
    float totalCloudDx = (skyUV.x - v_uv.x) + cloudDx;
    vec2 displaced = clamp(v_uv + vec2(plantDx + totalCloudDx, plantDy + cloudDy), 0.0, 1.0);
    gl_FragColor = texture2D(u_tex, displaced);
  }`;

function compileShader(gl: WebGLRenderingContext, type: number, src: string): WebGLShader | null {
    const shader = gl.createShader(type);
    if (!shader) {
        return null;
    }

    gl.shaderSource(shader, src);
    gl.compileShader(shader);
    return shader;
}

export default function SwayCanvas() {
    const canvasRef = useRef<HTMLCanvasElement | null>(null);

    useEffect(() => {
        const canvas = canvasRef.current;
        if (!canvas) {
            return;
        }

        let animationFrame = 0;
        let resizeObserver: ResizeObserver | null = null;
        let cancelled = false;

        const img = new Image();
        img.src = '/hero-bg.jpg';

        img.onload = () => {
            if (cancelled || !canvasRef.current) {
                return;
            }

            const gl = canvas.getContext('webgl', { preserveDrawingBuffer: true });
            if (!gl) {
                return;
            }

            const resize = (): void => {
                canvas.width = canvas.offsetWidth || 1280;
                canvas.height = canvas.offsetHeight || 720;
                gl.viewport(0, 0, canvas.width, canvas.height);
            };

            resize();

            const program = gl.createProgram();
            const vertShader = compileShader(gl, gl.VERTEX_SHADER, VERT);
            const fragShader = compileShader(gl, gl.FRAGMENT_SHADER, FRAG);

            if (!program || !vertShader || !fragShader) {
                return;
            }

            gl.attachShader(program, vertShader);
            gl.attachShader(program, fragShader);
            gl.linkProgram(program);
            gl.useProgram(program);

            const buffer = gl.createBuffer();
            gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
            gl.bufferData(
                gl.ARRAY_BUFFER,
                new Float32Array([-1, -1, 1, -1, -1, 1, -1, 1, 1, -1, 1, 1]),
                gl.STATIC_DRAW,
            );

            const position = gl.getAttribLocation(program, 'a_pos');
            gl.enableVertexAttribArray(position);
            gl.vertexAttribPointer(position, 2, gl.FLOAT, false, 0, 0);

            const uTime = gl.getUniformLocation(program, 'u_time');
            gl.uniform1i(gl.getUniformLocation(program, 'u_tex'), 0);

            const texture = gl.createTexture();
            gl.bindTexture(gl.TEXTURE_2D, texture);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_S, gl.CLAMP_TO_EDGE);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_WRAP_T, gl.CLAMP_TO_EDGE);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MIN_FILTER, gl.LINEAR);
            gl.texParameteri(gl.TEXTURE_2D, gl.TEXTURE_MAG_FILTER, gl.LINEAR);
            gl.texImage2D(gl.TEXTURE_2D, 0, gl.RGBA, gl.RGBA, gl.UNSIGNED_BYTE, img);

            const loop = (timestamp: number): void => {
                gl.uniform1f(uTime, timestamp / 1000);
                gl.drawArrays(gl.TRIANGLES, 0, 6);
                animationFrame = requestAnimationFrame(loop);
            };

            animationFrame = requestAnimationFrame(loop);

            resizeObserver = new ResizeObserver(() => {
                resize();
            });
            resizeObserver.observe(canvas);
        };

        return () => {
            cancelled = true;
            if (animationFrame) {
                cancelAnimationFrame(animationFrame);
            }
            if (resizeObserver) {
                resizeObserver.disconnect();
            }
        };
    }, []);

    return (
        <canvas
            ref={canvasRef}
            className="hero-glow"
            style={{ position: 'absolute', inset: 0, width: '100%', height: '100%', display: 'block' }}
        />
    );
}
