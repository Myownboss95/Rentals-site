import { defineConfig, loadEnv } from 'vite'
import laravel, { callArtisan, callShell } from 'vite-plugin-laravel'
import vue from '@vitejs/plugin-vue'
import inertia from './resources/scripts/vite/inertia-layout'
import * as fs from 'fs'
import os from 'node:os'
import process from 'node:process'
import {exec} from 'child_process'

const domain = 'binotomo.test';
let certPath = `${os.homedir()}/.config/valet/Certificates/${domain}`;

export default defineConfig(({ mode }) => {
    let env = loadEnv(mode, process.cwd());

    function serverData() {
    if (env.VITE_APP_ENV == 'production') {
        return {}
    }
    return {
        host: domain,
        https: {
            key: fs.readFileSync(`${certPath}.key`),
            cert: fs.readFileSync(`${certPath}.crt`),
        }
    }
}

    return {
        plugins: [
		inertia(),
		vue(),
        laravel({
            watch: [
                {
                    condition: file => file.includes('routes/') && file.endsWith('.php'),
                    handle: () => callShell('php artisan ziggy:generate')
                }
            ]
        }),
        ],
        server: serverData()
    }
})


